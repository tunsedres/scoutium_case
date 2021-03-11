<?php

namespace App\Http\Controllers;

use App\Events\InviteCreated;
use App\Http\Resources\GeneralResponse;
use App\Http\Resources\InvitationResource;
use App\Repositories\InviteRepositoryInterface;

class InvitationController extends Controller
{
    /**
     * @var InviteRepositoryInterface
     */
    private $inviteRepository;

    /**
     * InvitationController constructor.
     * @param InviteRepositoryInterface $inviteRepository
     */
    public function __construct(InviteRepositoryInterface $inviteRepository)
    {
        $this->inviteRepository = $inviteRepository;
    }

    public function sendInvitation()
    {
        //validate request
        $this->validate(request(), [
            'email' => 'required|unique:user_invitations|email'
        ]);
        

        $invitation = $this->inviteRepository->create(request()->only('email'));

        if($invitation) {

            /** send invitation email */
            event(new InviteCreated($invitation));

            return new InvitationResource($invitation);

        }

        return new GeneralResponse(
            null, 500, 'An error occured processing email sending', false
        );

    }

}
