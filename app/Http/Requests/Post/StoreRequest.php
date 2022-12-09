<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRequest extends FormRequest
{
    public static function myRules()
    {
        return  [
            "title" => "required|min:5|max:255",
            "slug" => "required|min:5|max:255|unique:posts",
            "content" => "required|min:10",
            "category_id" => "required|integer",
            "description" => "required|min:7",
            "posted" => "required",
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->title)->slug()->value()
        ]);
    }
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
        return self::myRules();
    }
}
