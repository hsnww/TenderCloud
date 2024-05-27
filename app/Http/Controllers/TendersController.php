<?php
namespace App\Http\Controllers;

use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TendersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company) {
            return redirect()->route('home')->with('error', 'You are not associated with any company.');
        }

        $tenders = $company->tenders()->where('status', '!=', 'disabled')->get();

        return view('tenders.index', compact('tenders', 'company'));
    }

    public function create()
    {
        return view('tenders.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company) {
            return redirect()->route('home')->with('error', 'You are not associated with any company.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'opening_date' => 'required|date',
            'document_fee' => 'required|numeric',
            'status' => 'required|string|in:active,disabled',
        ]);

        $company->tenders()->create([
            'name' => $request->name,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'submission_deadline' => $request->submission_deadline,
            'opening_date' => $request->opening_date,
            'document_fee' => $request->document_fee,
            'status' => $request->status,
        ]);

        return redirect()->route('tenders.index')->with('success', 'Tender created successfully');
    }

    public function edit(Tender $tender)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company || !$company->tenders->contains($tender)) {
            return redirect()->route('home')->with('error', 'You are not authorized to edit this tender.');
        }

        return view('tenders.edit', compact('tender'));
    }

    public function update(Request $request, Tender $tender)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company || !$company->tenders->contains($tender)) {
            return redirect()->route('home')->with('error', 'You are not authorized to update this tender.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'submission_deadline' => 'required|date',
            'opening_date' => 'required|date',
            'document_fee' => 'required|numeric',
            'status' => 'required|string|in:active,disabled',
        ]);

        $tender->update($request->all());

        return redirect()->route('tenders.index')->with('success', 'Tender updated successfully');
    }

    public function requestDelete(Tender $tender)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company || !$company->tenders->contains($tender)) {
            return redirect()->route('home')->with('error', 'You are not authorized to delete this tender.');
        }

        try {
            // تعيين الحالة إلى 'disabled' باستخدام forceFill وحفظ النموذج
            $tender->forceFill([
                'status' => 'disabled',
            ])->save();

            // قم بإلغاء جميع العروض المرتبطة
//            if ($tender->bids()->exists()) {
//                $tender->bids()->update(['status' => 'cancelled']);
//            }

            return redirect()->route('tenders.disabled')->with('success', 'Tender delete request sent successfully');
        } catch (\Exception $e) {
            return redirect()->route('tenders.index')->with('error', 'Failed to request tender deletion: ' . $e->getMessage());
        }
    }

    public function showDisabled()
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company) {
            return redirect()->route('home')->with('error', 'You are not associated with any company.');
        }

        $tenders = $company->tenders()->where('status', 'disabled')->get();

        return view('tenders.disabled', compact('tenders'));
    }
    public function restore(Tender $tender)
    {
        $user = Auth::user();
        $company = $user->companies()->first();

        if (!$company || !$company->tenders->contains($tender)) {
            return redirect()->route('home')->with('error', 'You are not authorized to restore this tender.');
        }

        try {
            // تعيين الحالة إلى 'active' باستخدام forceFill وحفظ النموذج
            $tender->forceFill([
                'status' => 'active',
            ])->save();

            return redirect()->route('tenders.disabled')->with('success', 'Tender restore request sent successfully');
        } catch (\Exception $e) {
            return redirect()->route('tenders.disabled')->with('error', 'Failed to restore tender: ' . $e->getMessage());
        }
    }


}
