<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $request->id,
            'libelle' => $request->libelle,
            'prix' => $request->prix,
            'stock' => $request->stock,
            'image' => $request->image,
            'reference' => $request->reference,
            'categori_id' => new CategorieResource($this->categorie),
            'fournisseur' => $request->fournisseur,
        ];
    }
}
