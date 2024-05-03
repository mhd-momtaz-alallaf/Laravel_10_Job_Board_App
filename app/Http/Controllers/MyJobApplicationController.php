<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        return view(
            'my_job_application.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications') // if we want not just the job but we want do more complicate things on it like jobApplications count and the expected_salary avg, so we do it inside an arrow function
                            ->withAvg('jobApplications', 'expected_salary'),
                        'job.employer' // we get the job with the employer to aptimize the queries that made from the index page
                    ])
                    ->latest()->get()
            ]
        );
    }

    public function destroy(string $id)
    {
        //
    }
}