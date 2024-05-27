<?php
namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vendor = $user->vendors()->first();

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'You are not associated with any vendor.');
        }

        return view('vendors.index', compact('vendor'));
    }
    public function show()
    {
        $user = Auth::user();
        $vendor = $user->vendors()->first();

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'You are not associated with any vendor.');
        }

        return view('vendors.index', compact('vendor'));
    }

    public function edit()
    {
        $user = Auth::user();
        $vendor = $user->vendors()->first();

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'You are not associated with any vendor.');
        }

        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $vendor = $user->vendors()->first();

        if (!$vendor) {
            return redirect()->route('home')->with('error', 'You are not associated with any vendor.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:vendors,email,' . $vendor->id,
            'phone' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'employees_count' => 'required|integer|min:1',
            'established_at' => 'required|date',
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.show')->with('success', 'Vendor updated successfully');
    }
}
