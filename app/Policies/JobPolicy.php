<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy // the job policy have two relaited controllers (JobController and MyJobController) sharing the same resource(job model) this will couse a problem in the automatic policy apply, by example poth controllers have the index method that match the viewAny ability in the jobPolicy, so we will add separete abilities to each controller and use the authorize method to manually apply the policy ability.
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function viewAnyEmployer(User $user): bool // allow if the user is authenticated.
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Job $job): bool // this will used only in the JobController
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null; // only users they have employer account can create a job
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Job $job): bool|Response
    {
        if ($job->employer->user_id !== $user->id) { // privent update if the current user is not the ouner of the job (the employer)
            return false;
        }

        if ($job->jobApplications()->count() > 0) { // privent update if job have some applications.
                                                    // we used ->jobApplications() as method relation to just make a simple count query.
                                                    // if we use ->jobApplications as a property that will load the relation and querying all the relaited data from the database then will make the count query on them.
            return Response::deny('Cannot change the job with applications');
        }

        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id; // allow if the current user is the ouner of the job (the employer)
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Job $job): bool
    {
        return $job->employer->user_id === $user->id;
    }


    public function apply(User $user, Job $job): bool
    {
        return !$job->hasUserApplied($user); // if the user has not applied for job yet allow him to apply, otherwise prevent him from applying.
    }
}