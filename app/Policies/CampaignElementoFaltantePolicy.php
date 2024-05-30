<?php

namespace App\Policies;

use App\Models\CampaignElementoFaltante;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignElementoFaltantePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CampaignElementoFaltante  $campaignElementoFaltante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, CampaignElementoFaltante $campaignElementoFaltante)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CampaignElementoFaltante  $campaignElementoFaltante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, CampaignElementoFaltante $campaignElementoFaltante)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CampaignElementoFaltante  $campaignElementoFaltante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, CampaignElementoFaltante $campaignElementoFaltante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CampaignElementoFaltante  $campaignElementoFaltante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, CampaignElementoFaltante $campaignElementoFaltante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CampaignElementoFaltante  $campaignElementoFaltante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, CampaignElementoFaltante $campaignElementoFaltante)
    {
        //
    }
}
