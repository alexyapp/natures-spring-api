<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class PageController extends Controller
{
    /**
     * Return Careers page
     */
    public function careers(Request $request)
    {
        if ($search = $request->search)
            $jobs = Job::whereHas('island_group', function ($q) {
                            $q->where('')
                                ->orWhere('description', 'like', '%' . $search . '%')
                                ->where('title', 'like', '%' . $search . '%');
                        })
                        ->get();

        $jobs = Job::paginate(10);
        return view('website.careers.index', compact('jobs'));
    }
}
