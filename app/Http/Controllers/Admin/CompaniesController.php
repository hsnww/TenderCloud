<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Tender;
use App\Models\BidRequest;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
//        $companies = Company::paginate(5);
        return view('admin.companies.index');
    }
    public function create()
    {
        return view('admin.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:companies,email',
            'phone' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'employees_count' => 'required|integer|min:1',
            'established_at' => 'required|date',
        ]);

        Company::create($request->all());

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully');
    }

    public function edit(Company $company)
    {
        $companyMembers = User::role('company_member')->whereDoesntHave('companies')->get();
        return view('admin.companies.edit', compact('company', 'companyMembers'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => [
                'nullable',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    if ($value && User::find($value)->companies()->exists()) {
                        $fail('The selected user is already assigned to another company.');
                    }
                },
            ],
        ]);

        $company->update($request->only('name'));

        if ($request->filled('user_id')) {
            $user = User::find($request->user_id);
            $company->users()->sync([$user->id]);
        } else {
            $company->users()->detach();
        }

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully');
    }

    public function destroy(Company $company)
    {
        //return back with an error message 'You can't delete this company right now'
        return redirect()->route('admin.companies.index')->with('error', 'You can\'t delete this company right now');
//        $company->delete();
//        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully');
    }
}
