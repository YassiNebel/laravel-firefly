<?php

namespace Bitporch\Firefly\Requests\Discussions;

use Illuminate\Foundation\Http\FormRequest;

class CreateDiscussionRequest extends FormRequest
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
            'group_id' => 'required',
            'title'    => 'required',
            'content'  => 'required',
        ];
    }
}
