<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
                    'name' => 'required|min:2|unique:employees',
                    'status_id' => 'required|integer|exists:App\Models\References,id|in:3,4',
                    'salary' => 'required|integer|min:2000000|max:10000000'
                ];
            }
            case 'GET':
            {
                return [
                    'per_page' => 'integer', 
                    'page' => 'integer', 
                    'order_by' => 'in:name,salary', 
                    'order_type' => 'in:ASC,DESC', 
                ];
            }
            default: break;
        }
        
    }
}
