<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasRole('admin') || $this->user()->hasRole('marketing');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'info' => 'required|string',
            'start_date' => 'required|date_format:Y-m-d H:i:s|after:tomorrow',
            'end_date' => 'required|date_format:Y-m-d H:i:s|after_or_equal:start_date'
        ];
    }
}
