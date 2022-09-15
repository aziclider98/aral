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
            'post_image' => 'image|mimes:jpeg,jpg,png|nullable|max:5000'
        ];
    }
    public function messages()
    {
        return [

            'en_title.required' =>'The English Post title field is required.',
            'en_text.required' =>'The English Post text field is required.',
            'ru_title.required' =>'The Russian Post title field is required.',
            'ru_text.required' =>'The Russian Post text field is required.',
            'uz_title.required' =>'The Uzbek Post title field is required.',
            'uz_text.required' =>'The Uzbek Post text field is required.',
            'qqr_title.required' =>'The Karakalpak Post title field is required.',
            'qqr_text.required' =>'The Karakalpak Post text field is required.',

        ];


    }
}

