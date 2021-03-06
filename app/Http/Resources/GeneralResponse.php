<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResponse extends JsonResource
{
    private $responseCode;
    private $message;
    private $status;

    public function __construct($resource, $responseCode, $message, $status)
    {
        parent::__construct($resource);
        $this->responseCode = $responseCode;
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'message' => $this->message
        ];
    }

    public function with($request)
    {
        return [
            'success' => $this->status
        ];
    }

    public function withResponse($request, $response)
    {
        $response->setStatusCode($this->responseCode);
    }


}
