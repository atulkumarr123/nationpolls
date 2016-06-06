<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;
class NationPollRequest extends Request
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

        return [
            'title' => 'required|unique:polls|min:7',
            'category'=>'required',
            'options'=>'required',
            'poll_duration' => 'required|integer|min:0',
            'image'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'category.required' => 'Category is required',
            'options.required' => 'Options are required e.g, YES, NO, MAY BE',
            'poll_duration.required' => 'Poll Duration is required (i.e, number of days like 8, 50)',
        ];
    }
}
