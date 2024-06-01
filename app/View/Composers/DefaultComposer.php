<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Tender;
use App\Models\Company;
use App\Models\Vendor;
use App\Models\Activity;
use App\Models\ProjectType;
use Illuminate\Support\Facades\Auth;

class DefaultComposer
{
    public function compose(View $view)
    {
        $tenders = Tender::OrderBy('created_at')->paginate(5);
        $companies = Company::OrderBy('created_at')->paginate(10);
        $vendors = Vendor::OrderBy('created_at')->paginate(10);
        $activities = Activity::all();
        $projects_types = ProjectType::all();
        $url = null;
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->hasRole('administrator')) {
                $url = url('/admin');
            } elseif ($user->hasRole('vendor_member')) {
                $url = url('/vendors');
            } elseif ($user->hasRole('company_member')) {
                $url = url('/companies');
            }else {
                $url = url('/dashboard');
            }
        }
        $view->with(compact('tenders', 'companies', 'vendors', 'activities', 'projects_types', 'url'));
    }
}
