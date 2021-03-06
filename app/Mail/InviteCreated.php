<?php

namespace App\Mail;

use App\Models\UserInvitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteCreated extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var UserInvitation
     */
    public $invite;

    /**
     * Create a new message instance.
     *
     * @param UserInvitation $invite
     */
    public function __construct(UserInvitation $invite)
    {
        $this->invite = $invite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user_invite');
    }
}
