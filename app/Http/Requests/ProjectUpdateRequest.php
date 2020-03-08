<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required',
            'name' => 'required',
            'state' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'slug' => 'required|unique:projects,slug,' . $this->project,
            'investigation_group_id' => 'required',
        ];
    }
}