<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PutRequest extends FormRequest
{
 

    public function myRules()
    {
        
        return  [
            "title" => "required|min:5|max:255",
            "slug" => "required|min:5|max:255|unique:posts,slug,".$this->route("post")->id,
            "content" => "required|min:10",
            "category_id" => "required|integer",
            "description" => "required|min:7",
            "posted" => "required",
            "image" => "mimes:jpeg,jpg,png|max:10240"
        ];
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
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => str($this->slug)->slug()->value()
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
    
        return $this->myRules();
    }
}
