<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EventRequest extends FormRequest
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
        $rules = [
            'event_type_id' => 'required|integer|exists:event_types,id',
            'short_description' => 'required|string|max:255',
            'description' => 'required|string',
            'is_completed' => 'boolean',
            'date' => 'required|date',
        ];

        if ($this->isMethod(Request::METHOD_PATCH) ) {
            $isDeleting = $this->has('delete');
            $isDateChanged =  !$this->event->date->eq(
                new Carbon($this->get('date'))
            );

            if ($isDateChanged or $isDeleting) {
                $rules['last_update_reason'] = 'required|string|max:255';
            }
        }

        return $rules;
    }
}
