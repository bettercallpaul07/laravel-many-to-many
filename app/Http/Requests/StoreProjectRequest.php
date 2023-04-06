<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            "title" => "required|unique:projects,title|max:128",
            "content" => "required|max:4096",
            "category_id" => "nullable|exists:categories,id",
            "tags" => "nullable|array|exists:tags,id"

            //title deve essere unico nella tabella projects colonna title e con max 128 caratteri ed è obbligatorio
            //content deve essere unico nella tabella projects colonna content e con max 4096 caratteri ed è obbligatorio
            //category_id deve essere un id esistente nella tabella categories colonna id e può essere null
            //tags deve essere un array di id esistenti nella tabella tags colonna id e può essere null

        ];
    }
}
