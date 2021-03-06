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
            'email' => 'required|email'
        ]);

        //@todo: if this user generate a code for tthis email return a gentle error
        if($this->checkUserInvitationExist()){
            return new GeneralResponse(
                null, 200, 'You have already invited this email!', false
            );
        }

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

    private function checkUserInvitationExist()
    {
        return $this->inviteRepository->findByEmail(request('email'));
    }
}
