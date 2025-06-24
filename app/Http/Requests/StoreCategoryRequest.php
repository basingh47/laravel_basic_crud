<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use Closure;
class StoreCategoryRequest extends FormRequest
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
            "categoryName" => [
                'required',
                function (string $attribute, mixed $value, Closure $fail) {
                    $result = Category::where('category_name', '=', $value)->count();
                    // dd($isExits);
                    // dd($result > 0);
                    if ($result !== 0)
                  {
                        return $fail('Category Name Already Exit');
                    }
                }
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Field is Empty'
        ];
    }
}
