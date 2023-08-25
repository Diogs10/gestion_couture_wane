<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            "libelle" => "required|unique:articles,libelle",
            "prix" => "required|min:0|regex:/^[0-9]+$/",
            "stock" => "required|min:0|regex:/^[0-9]+$/",
            "categorie_id" => "required|min:1|regex:/^[0-9]+$/",
            "reference" => "required|unique:articles,reference",
            "fournisseur" => "required",
        ];
    }

    public function messages()
    {
        return [
            "libelle.required" => "Le nom est obligatoire",
            "libelle.unique" => "Libelle existe déjà",
            "prix.required" => "Le prix est obligatoire",
            "prix.min" => "Le prix doit etre superieur à 0",
            "prix.regex" => "Le prix doit avoir que des chiffres",
            "stock.required" => "Le stock est obligatoire",
            "stock.min" => "Le stock doit etre superieur à 0",
            "stock.regex" => "Le stock doit avoir que des chiffres",
            "categorie_id.required" => "Le categorie_id est obligatoire",
            "categorie_id.min" => "Le categorie_id doit etre superieur à 0",
            "categorie_id.regex" => "Le categorie_id doit avoir que des chiffres",
            "fournisseur.required" => "Le fournisseur est obligatoire",
            "reference.required" => "Le reference est obligatoire",
            "reference.unique" => "Le reference existe déjà",
            // "image.required" => "Le image est obligatoire",
            // "image.mimes" => "Le format doit etre jpeg,png,gif,jpg ou svg",
        ];
    }
}
