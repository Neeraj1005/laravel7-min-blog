<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
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
            'title' => 'required|max:200',
            'body' => 'required',
            'photo_id' => 'file|mimes:jpeg,jpg,png|max:1024',
            'category_id' => 'required|not_in:0',
            'tags' => 'exists:tags,id'
        ];
    }
}
