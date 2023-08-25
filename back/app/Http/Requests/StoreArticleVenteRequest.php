<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleVenteRequest extends FormRequest
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
            "libelle" => "required|unique:article_ventes,libelle|min:3",
            "categorie_id" => "required|exists:categories,id",
            "promo" => "numeric",
            "reference" => "required|unique:article_ventes,reference",
            "image" => "required",
            "prix_fabrication" => "required|numeric",
            "prix_vente" => "required|numeric",
            "marge" => "required|numeric",
            "quantite_AV" => "numeric",
        ];
    }

    public function messages()
    {
        return [
            "libelle.required" => "Le libelle est obligatoire",
            "libelle.unique" => "Le libelle doit être unique",
            "libelle.min" => "Le libelle doit avoir au moins 3 caractères",
            "categorie_id.required" => "La catégorie est obligatoire",
            "categorie_id.exists" => "La catégorie n'existe pas",
            "promo.numeric" => "La promotion doit être un nombre",
            "reference.required" => "La référence est obligatoire",
            "reference.unique" => "La référence doit être unique",
            "image.required" => "L'image est obligatoire",
            "prix_fabrication.required" => "Le prix de fabrication est obligatoire",
            "prix_fabrication.numeric" => "Le prix de fabrication doit être un nombre",
            "prix_vente.required" => "Le prix de vente est obligatoire",
            "prix_vente.numeric" => "Le prix de vente doit être un nombre",
            "marge.required" => "La marge est obligatoire",
            "marge.numeric" => "La marge doit être un nombre",
            "quantite_AV.numeric" => "La quantité en stock doit être un nombre",
        ];
    }
}
