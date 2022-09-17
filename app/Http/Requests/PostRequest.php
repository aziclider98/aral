<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'en_title' => 'required|max:255',
            'en_text' => 'required|max:10000',
            'ru_title' => 'required|max:255',
            'ru_text' => 'required|max:10000',
            'uz_title' => 'required|max:255',
            'uz_text' => 'required|max:10000',
            'qqr_title' => 'required|max:255',
            'qqr_text' => 'required|max:10000',
            'category_id' => 'required',
            'post_image' => 'image|mimes:jpeg,jpg,png|max:5000'
        ];
    }
}

