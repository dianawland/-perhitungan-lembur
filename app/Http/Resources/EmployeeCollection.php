<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EmployeeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $employee = [];
        foreach($this->resource as $key => $item){
            $employee['data'][$key] = [
                'id' => $item->id,
                'name' => $item->name,
                'status_id' => $item->status_id,
                'status' => [
                    'name' => $item->status->name,
                ],
                'salary' => $item->salary
            ];
        }
        return $employee;
    }
}
