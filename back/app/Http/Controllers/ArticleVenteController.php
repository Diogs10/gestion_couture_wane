<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleVenteRequest;
use App\Http\Requests\UpdateArticleVenteRequest;
use App\Models\ArticleVente;

class ArticleVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($nombre)
    {
        //
        return ArticleVente::paginate($nombre);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleVenteRequest $request)
    {
        //
        $articleVente = new ArticleVente();
        $articleVente->libelle = $request->libelle;
        $articleVente->categorie_id = $request->categorie_id;
        $articleVente->promo = $request->promo;
        $articleVente->reference = $request->reference;
        $articleVente->image = $request->image;
        $articleVente->prix_fabrication = $request->prix_fabrication;
        $articleVente->prix_vente = $request->prix_vente;
        $articleVente->marge = $request->marge;
        $articleVente->save();
        return response()->json($articleVente);
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleVente $articleVente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleVenteRequest $request, ArticleVente $articleVente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleVente $articleVente)
    {
        //
    }
}
