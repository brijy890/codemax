<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class CarModelCollection extends Resource
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
            'id' => $this->id,
            'manufacturer_name' => $this->getManufacturer->manufacturer_name,
            'model_name' => $this->model_name,
            'remaing_count' => (int)$this->total - (int)$this->sold
        ];
    }
}
