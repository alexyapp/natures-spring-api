<?php

namespace App\Http\Controllers\Api;

use App\Models\Job;
use App\Models\IslandGroup;
use App\Models\Province;
use App\Models\City;
use App\Http\Resources\Job as JobResource;
use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\Job
     */
    public function index(Request $request)
    {
        if ($request->has('location') && $request->has('query')) {
            $islandGroup = IslandGroup::where('slug', $request->input('location'))->first();

            $jobs = Job::whereHas('province', function ($query) use ($request) {
                            $query->where('name', 'like', "%{$request->input('query')}%")
                                ->whereHas('islandGroup', function ($query) use ($request) {
                                    $query->where('slug', $request->input('location'));
                                });
                        })
                        ->orWhereHas('city', function ($query) use ($request) {
                            $query->where('name', 'like', "%{$request->input('query')}%")
                                ->whereHas('province.islandGroup', function ($query) use ($request) {
                                    $query->where('slug', $request->input('location'));
                                });
                        });

            return JobResource::collection($jobs->paginate(10));
        }

        if ($request->has('location')) {
            $islandGroup = IslandGroup::where('slug', $request->location)->first();
            return JobResource::collection($islandGroup->jobs()->latest()->paginate(10));
        }

        if (filter_var($request->all, FILTER_VALIDATE_BOOLEAN))
            $jobs = Job::all();
            return JobResource::collection($jobs);

        $jobs = Job::paginate(10);
        return JobResource::collection($jobs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Job
     */
    public function store(Request $request)
    {
        $job = Job::create(
            array_merge(
                $request->except('title'),
                [
                    'title' => ucwords($request->title),
                    'user_id' => $request->user()->id ?? auth()->guard('api')->user()->id
                ]
            )
        );

        return new JobResource($job);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return new JobResource($job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\JobRequest  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $job->update(
            array_merge(
                $request->except('title'),
                [
                    'title' => ucwords($request->title),
                    'user_id' => $request->user()->id ?? auth()->guard('api')->user()->id
                ]
            )
        );

        return new JobResource($job);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \App\Http\Resources\Job
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return new JobResource($job);
    }

    public function search(Request $request)
    {
        $q = $request->query('q');

        $jobs = Job::where('title', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->whereHas(function () {

            });
    }
}
