<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OvertimeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $overtime = [];
        foreach($this->resource as $key => $item){
            $overtime['data'][$key] = [
                'id' => $item->id,
                'employee_id' => $item->employee_id,
                'employee' => ['name' => $item->employee->name],
                'date' => $item->date,
                'time_started' => $item->time_started,
                'time_ended' => $item->time_ended,
            ];
        }
        return $overtime;
    }
}
