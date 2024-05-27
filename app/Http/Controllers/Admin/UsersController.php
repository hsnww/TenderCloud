<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role as ٌRole;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        $roles = ٌRole::all();
        $companies = Company::all();
        $vendors = Vendor::all();

        return view('admin.users.edit', compact('user', 'roles', 'companies', 'vendors'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'nullable|string|in:administrator,moderator,company_member,vendor_member',
            'company_id' => 'nullable|exists:companies,id',
            'vendor_id' => 'nullable|exists:vendors,id',
            'association_type' => 'nullable|string|in:company,vendor',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // تحديث بيانات المستخدم
        $user->update($request->only('name', 'email'));

        // تحديث الدور
        if ($request->filled('role')) {
            $user->syncRoles([$request->role]);
        } else {
            $user->syncRoles([]); // فك ارتباط المستخدم بأي دور
        }

        // فك الارتباط الحالي
        $user->companies()->detach();
        $user->vendors()->detach();

        // تحديد نوع الارتباط وإعادة الارتباط إذا تم تحديده
        if ($request->association_type == 'company' && $request->filled('company_id')) {
            $user->companies()->attach($request->company_id);
        } elseif ($request->association_type == 'vendor' && $request->filled('vendor_id')) {
            $user->vendors()->attach($request->vendor_id);
        }

        // تحديث كلمة المرور إذا تم توفيرها
        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function create()
    {
        $roles = ٌRole::all();
        $companies = Company::all();
        $vendors = Vendor::all();

        return view('admin.users.create', compact('roles', 'companies', 'vendors'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'nullable|string|in:administrator,moderator,company_member,vendor_member',
            'company_id' => 'nullable|exists:companies,id',
            'vendor_id' => 'nullable|exists:vendors,id',
            'association_type' => 'nullable|string|in:company,vendor',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($request->filled('role')) {
            $user->assignRole($request->role);
        }

        if ($request->association_type == 'company' && $request->filled('company_id')) {
            $user->companies()->attach($request->company_id);
        } elseif ($request->association_type == 'vendor' && $request->filled('vendor_id')) {
            $user->vendors()->attach($request->vendor_id);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }


    public function destroy($id)
    {


//      write a message to tell him not possible to delete any things right now
        return redirect()->route('admin.users.index')->with('error', 'You can not delete any user right now');
//  $user = User::findOrFail($id);
//        $user->delete();
//        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
