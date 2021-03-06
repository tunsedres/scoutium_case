<?php

namespace App\Events;

use App\Models\UserInvitation;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class InviteCreated
{
    use Dispatchable, SerializesModels;

    /**
     * @var UserInvitation
     */
    public $invitation;

    /**
     * Create a new event instance.
     *
     * @param UserInvitation $invitation
     */
    public function __construct(UserInvitation $invitation)
    {
        $this->invitation = $invitation;
    }


}
