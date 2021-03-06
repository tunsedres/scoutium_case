<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Lang;

class TokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $token = $request->user()->createToken($request->email);

        return [
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'email' => $request->email,
            'created_at' => Carbon::parse($request->user()->created_at)->diffForHumans(),
            'token' => $token->plainTextToken
        ];
    }

    public function with($request)
    {
        return Lang::get('messages.success');
    }
}
