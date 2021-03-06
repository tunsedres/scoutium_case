<?php

namespace App\Http\Controllers\Api\Auth;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Http\Resources\TokenResource;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * RegisterController constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {

        return 123;
        $request->validate([
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
        ]);

        $createdUser = $this->userRepository->create($request->all());

        //trigger event
        event(new UserCreated($createdUser));

        Auth::attempt($request->only(['email','password']));

        return new TokenResource($createdUser);
    }
}
