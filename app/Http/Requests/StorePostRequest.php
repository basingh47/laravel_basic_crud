<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'postTitle' => 'required|string|max:255',
            'postCategory' => 'required|exists:categories,id',
            'postTags' => 'nullable|string',
            'featuredImage' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'postContent' => 'required|string',
            'postStatus' => 'required|in:Draft,Publish,Scheduled',
        ];
    }
}
