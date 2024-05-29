<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Tender;
use App\Models\Company;
use App\Models\Vendor;
use App\Models\Activity;
use App\Models\ProjectType;

class DefaultComposer
{
    public function compose(View $view)
    {
        $tenders = Tender::OrderBy('created_at')->take(5)->get();
        $companies = Company::OrderBy('created_at')->take(10)->get();
        $vendors = Vendor::OrderBy('created_at')->take(10)->get();
        $activities = Activity::all();
        $projects_types = ProjectType::all();

        $view->with(compact('tenders', 'companies', 'vendors', 'activities', 'projects_types'));
    }
}
