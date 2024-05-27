<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $company = $user->companies()->first();
        return view('companies.index', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        return view('companies.show', compact('company'));
    }

    public function edit()
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        return view('companies.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:companies,email,'.$company->id,
            'phone' => 'required|string|max:20',
            'mobile' => 'required|string|max:20',
            'employees_count' => 'required|integer|min:1',
            'established_at' => 'required|date',
        ]);

        $company->update($request->all());

        return redirect()->route('companies.show')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
