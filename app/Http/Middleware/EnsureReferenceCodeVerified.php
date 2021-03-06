<?php

namespace App\Http\Middleware;

use App\Http\Resources\GeneralResponse;
use App\Repositories\InviteRepositoryInterface;
use Closure;
use Illuminate\Http\Request;

class EnsureReferenceCodeVerified
{
    /**
     * @var InviteRepositoryInterface
     */
    private $inviteRepository;

    /**
     * EnsureReferenceCodeVerified constructor.
     * @param InviteRepositoryInterface $inviteRepository
     */
    public function __construct(InviteRepositoryInterface $inviteRepository)
    {
        $this->inviteRepository = $inviteRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->reference_code){
            if($this->inviteRepository->referenceCodeExist($request->reference_code)){
                return $next($request);
            }
            return new GeneralResponse(
                null,
                404,
                'There is an error with your reference code',
                false
            );
        }

        return $next($request);

    }
}
