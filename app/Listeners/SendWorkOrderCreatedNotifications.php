<?php

namespace App\Listeners;

use App\Events\WorkOrderCreated;
use App\Models\User;
use App\Notifications\NewWorkOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWorkOrderCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\WorkOrderCreated  $event
     * @return void
     */
    public function handle(WorkOrderCreated $event)
    {
        foreach (User::whereNot('is_admin', 1)->cursor() as $user) {
            $user->notify(new NewWorkOrder($event->workOrder));
        }
    }
}
