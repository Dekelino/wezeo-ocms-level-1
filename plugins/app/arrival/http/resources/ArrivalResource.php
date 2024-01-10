<?php

namespace App\Arrival\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ArrivalResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'arrivalName' => $this->arrivalName,
            'userName' => $this->userName,
            'timestamp' => $this->timestamp,
        ];
    }
}