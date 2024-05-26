<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Company;
use App\Models\ProjectType;
use App\Models\Tender;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenders = Tender::OrderBy('created_at')->take(5)->get();
        $companies = Company::OrderBy('created_at')->take(10)->get();
        $vendors = Vendor::OrderBy('created_at')->take(10)->get();
        $activities = Activity::all();
        $projects_types = ProjectType::all();
        return view('default', compact('tenders', 'companies', 'vendors', 'activities', 'projects_types'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
