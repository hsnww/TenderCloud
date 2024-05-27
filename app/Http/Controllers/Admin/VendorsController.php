<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\User;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    public function index()
    {
        $vendors = Vendor::paginate(10);
        return view('admin.vendors.index', compact('vendors'));
    }

    public function edit(Vendor $vendor)
    {
        $vendorMembers = User::role('vendor_member')->whereDoesntHave('vendors')->get();
        return view('admin.vendors.edit', compact('vendor', 'vendorMembers'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => [
                'nullable',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value && User::find($value)->vendors()->exists()) {
                        $fail('The selected user is already assigned to another vendor.');
                    }
                },
            ],
        ]);

        $vendor->update($request->only('name'));

        // إزالة المستخدمين المرتبطين حاليًا بالشركة
        $vendor->users()->detach();

        // إضافة المستخدم الجديد إذا تم تحديده
        if ($request->filled('user_id')) {
            $user = User::find($request->user_id);
            $vendor->users()->attach($user->id);
        }

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor updated successfully');
    }
    public function create()
    {
        return view('admin.vendors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:vendors,email',
            'phone' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'employees_count' => 'required|integer|min:1',
            'established_at' => 'required|date',
        ]);

        Vendor::create($request->all());

        return redirect()->route('admin.vendors.index')->with('success', 'Vendor created successfully');
    }

    public function destroy(Vendor $vendor)
    {
        // redirect to back with error message
        return redirect()->back()->with('error', 'You can not delete a vendor');
//        $vendor->delete();
//        return redirect()->route('admin.vendors.index')->with('success', 'Vendor deleted successfully');
    }
}
