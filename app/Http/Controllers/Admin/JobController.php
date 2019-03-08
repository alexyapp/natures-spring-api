<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\IslandGroup;
use App\Models\Job;
use DataTables;

class JobController extends Controller
{
    /**
     * 
     */
    public function datatable()
    {
        $jobs = Job::all();
        return DataTables::of($jobs)
                ->editColumn('user_id', function (Job $job) {
                    return $job->poster->name;
                })
                ->editColumn('description', function (Job $job) {
                    return Str::limit(strip_tags($job->description), 20);
                })
                ->editColumn('created_at', function (Job $job) {
                    return $job->created_at->format('M d, Y h:i A');
                })
                ->editColumn('updated_at', function (Job $job) {
                    return $job->updated_at->format('M d, Y h:i A');
                })
                ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lastUpdated = Job::latest('updated_at')->firstOrFail()->updated_at->format('F d, Y g:i A');
        return view('admin.jobs.index', compact('lastUpdated'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $islandGroups = IslandGroup::all();
        return view('admin.jobs.create', compact('islandGroups'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $islandGroups = IslandGroup::all();
        return view('admin.jobs.edit', compact(['job', 'islandGroups']));
    }
}
