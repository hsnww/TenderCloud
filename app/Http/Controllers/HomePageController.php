<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Company;
use App\Models\ProjectType;
use App\Models\Tender;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BidRequest;


class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('default');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tenders()
    {
        $alltenders = Tender::OrderBy('created_at')->paginate(5);
        return view('tenders', compact('alltenders'));
    }

    public function createBidRequest($tender_id)
    {

        // جلب بيانات المناقصة
        $tender = Tender::findOrFail($tender_id);

        // جلب بيانات الشركة
        $company = Company::findOrFail($tender->company_id);

        // جلب vendor_id للمستخدم الحالي
        $vendor = Auth::user()->vendors()->firstOrFail();
        $vendor_id = $vendor->id;

        return view('bid_requests', compact('tender', 'company', 'vendor'));
    }

    public function storeBidRequest(Request $request)
    {

        // التحقق من وجود تقديم مسبق
        $existingBid = BidRequest::where('vendor_id', Auth::user()->vendors()->first()->id)
            ->where('tender_id', $request->tender_id)
            ->first();

        if ($existingBid) {
            return redirect()->route('tender.details', ['id' => $request->tender_id])
                ->with('error', 'لقد سبق لك التقديم على هذه المناقصة.');
        }

        $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        BidRequest::create([
            'vendor_id' => Auth::user()->vendors()->first()->id,
            'tender_id' => $request->tender_id,
            'status' => 'pending',
            'payment_status' => 'unpaid',
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('tenders.show', $request->tender_id)->with('success', 'تم تقديم العطاء بنجاح');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Tender $tender)
    {
//        $tenders = Tender::OrderBy('created_at')->take(5)->get();
//        $companies = Company::OrderBy('created_at')->take(10)->get();
//        $vendors = Vendor::OrderBy('created_at')->take(10)->get();
//        $activities = Activity::all();
//        $projects_types = ProjectType::all();

//        return view('showTender', compact('tender', 'tenders', 'companies', 'vendors', 'activities', 'projects_types'));
        return view('showTender', compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     */

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
    public function searchTender(Request $request)
    {
        // تحقق من تعبئة حقل واحد على الأقل
        $request->validate([
            'project_name' => 'required_without_all:project_number,entity,activity,project_type',
            'project_number' => 'required_without_all:project_name,entity,activity,project_type',
            'entity' => 'required_without_all:project_name,project_number,activity,project_type',
            'activity' => 'required_without_all:project_name,project_number,entity,project_type',
            'project_type' => 'required_without_all:project_name,project_number,entity,activity',
        ], [
            'required_without_all' => 'يرجى تعبئة حقل واحد على الأقل للبحث.'
        ]);

        $query = Tender::query();

        if ($request->filled('project_name')) {
            $query->where('name', 'like', '%' . $request->input('project_name') . '%');
        }

        if ($request->filled('project_number')) {
            $query->where('id', $request->input('project_number'));
        }

        if ($request->filled('entity')) {
            $query->where('company_id', $request->input('entity'));
        }

        if ($request->filled('activity')) {
            $query->where('activity_id', $request->input('activity'));
        }

        if ($request->filled('project_type')) {
            $query->where('project_type_id', $request->input('project_type'));
        }

        $tenders_results = $query->get();

        return view('results', compact('tenders_results'));
    }

}
