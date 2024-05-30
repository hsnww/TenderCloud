<?php

namespace App\Http\Controllers;

use App\Models\BidRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Tender;
use App\Models\Company;
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

    public function showCompanyTenders()
    {
        // تأكد من أن المستخدم الحالي لديه صلاحية company_member
        if (!Auth::user()->hasRole('company_member')) {
            abort(403, 'Unauthorized action.');
        }

        // استرجاع الشركة الخاصة بالمستخدم
        $company = Auth::user()->companies()->first();

        // استرجاع المناقصات الخاصة بالشركة
        $tenders = $company->tenders;

        return view('companies.tenders', compact('company', 'tenders'));
    }

    public function showAllBids()
    {
        // تأكد من أن المستخدم الحالي لديه صلاحية company_member
        if (!Auth::user()->hasRole('company_member')) {
            abort(403, 'Unauthorized action.');
        }

        // استرجاع الشركة الخاصة بالمستخدم
        $company = Auth::user()->companies()->first();
         // استرجاع جميع العروض المقدمة إلى مناقصات الشركة
        $bids = BidRequest::whereHas('tender', function($query) use ($company) {
            $query->where('company_id', $company->id);
        })->with('tender', 'vendor')->get();
         return view('companies.bids', compact('company', 'bids'));
    }

    public function showBidDetails(Tender $tender, BidRequest $bidRequest)
    {
        // تأكد من أن المستخدم الحالي لديه صلاحية company_member
        if (!Auth::user()->hasRole('company_member')) {
            abort(403, 'Unauthorized action.');
        }

        // تأكد من أن الشركة الخاصة بالمستخدم الحالي هي صاحبة المناقصة
        if ($tender->company_id !== Auth::user()->companies->first()->id) {
            abort(403, 'Unauthorized action.');
        }

        // تحقق من تاريخ فتح المظاريف
        if (Carbon::now()->lt(Carbon::parse($tender->opening_date))) {
            abort(403, 'Cannot view details until the opening date.');
        }

        // استرجاع تفاصيل العرض
        $vendor = $bidRequest->vendor;

        return view('companies.bidDetails', compact('tender', 'bidRequest', 'vendor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
