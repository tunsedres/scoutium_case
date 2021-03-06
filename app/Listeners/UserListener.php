<?php

namespace App\Listeners;

use App\Models\UserWallet;
use App\Repositories\UserWalletRepositoryInterface;

class UserListener
{
    /**
     * @var UserWalletRepositoryInterface
     */
    private $userWalletRepository;

    /**
     * Create the event listener.
     *
     * @param UserWalletRepositoryInterface $userWalletRepository
     */
    public function __construct(UserWalletRepositoryInterface  $userWalletRepository)
    {
        $this->userWalletRepository = $userWalletRepository;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        //if the user has a reference code
        if($event->user->reference_code && $event->user->reference_code != ''){

            $this->addReferenceRewards($event);

        }

    }

    private function addReferenceRewards($event)
    {

        if(!$event->user->invitation->redeemed){

            //add 50 TRY to reference user's wallet
            $this->userWalletRepository->addWallet($event->user->invitation->created_by, UserWallet::REFERENCE_USER_REWARD);

            //add 30 TRY to registered user's wallet
            $this->userWalletRepository->addWallet($event->user->id, UserWallet::NEW_USER_REWARD);

            //redeem reference code
            $event->user->invitation()->update([
                'redeemed' => 1
            ]);

        }

    }
}
