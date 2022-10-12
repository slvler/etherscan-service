<?php


namespace Slvler\Ether\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Balance extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'status' => $this->status,
            'message' => $this->message,
            'result' => $this->result
        ];

    }
}