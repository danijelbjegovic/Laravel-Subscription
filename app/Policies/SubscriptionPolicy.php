<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Laravel\Cashier\Subscription;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    public function cancel(User $user, Subscription $subscription)
    {
        return ! $subscription->cancelled();
    }

    public function resume(User $user, Subscription $subscription)
    {
        return $subscription->cancelled();
    }
}
