<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateUserFormRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules() {
        $id = $this->id ?? "";
        $rules = [
            "name" => "required|string|max:50|min:3",
            "email" => "required|string|email|max:100|unique:users,email,{$id},id",
            "password" => "required|string|min:6",
            "image" => "file|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable",
        ];

        if ($this->method("PUT")) {
            $rules["password"] = "nullable|string|min:6";
        }

        return $rules;
    }
}
