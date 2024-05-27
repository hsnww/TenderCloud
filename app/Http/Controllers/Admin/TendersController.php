<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ProjectType;
use App\Models\Tender;
use App\Models\Company;
use Illuminate\Http\Request;

class TendersController extends Controller
{
    public function index()
    {
        $tenders = Tender::paginate(10);
        return view('admin.tenders.index', compact('tenders'));
    }

    public function create()
    {
        $companies = Company::all();
        $activities = Activity::all();
        $projectTypes = ProjectType::all();
        return view('admin.tenders.create', compact('companies', 'activities', 'projectTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'activity_id' => 'required|integer',
            'project_type_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'opening_date' => 'required|date',
            'document_fee' => 'required|numeric',
        ]);

        Tender::create($request->all());

        return redirect()->route('admin.tenders.index')->with('success', 'Tender created successfully');
    }

    public function edit(Tender $tender)
    {
        $companies = Company::all();
        $activities = Activity::all();
        $projectTypes = ProjectType::all();
        return view('admin.tenders.edit', compact('tender', 'companies', 'activities', 'projectTypes'));
    }

    public function update(Request $request, Tender $tender)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'activity_id' => 'required|integer',
            'project_type_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'opening_date' => 'required|date',
            'document_fee' => 'required|numeric',
        ]);

        $tender->update($request->all());

        return redirect()->route('admin.tenders.index')->with('success', 'Tender updated successfully');
    }

    public function destroy(Tender $tender)
    {
        return redirect()->route('admin.tenders.index')->with('error', 'You cannot delete a tender right now');
//        $tender->delete();
//        return redirect()->route('admin.tenders.index')->with('success', 'Tender deleted successfully');
    }
}
