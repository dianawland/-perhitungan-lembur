<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OvertimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'employee_id' => 'required|integer|exists:App\Models\Employee,id',
                    'date' => 'required|date|unique:overtimes|date_format:Y-m-d',
                    'time_started' => 'required|date_format:H:i|before:time_ended',
                    'time_ended' => 'required|date_format:H:i|after:time_started',
                ];
            }
            case 'GET':
            {
                return [
                    'date_started' => 'required|date|date_format:Y-m-d|before:date_ended', 
                    'date_ended' => 'required|date|date_format:Y-m-d|after:date_started', 
                ];
            }
            default: break;
        }
    }
}
