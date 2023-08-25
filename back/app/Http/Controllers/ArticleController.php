<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\ArticleFournisseur;
use App\Models\Categorie;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //
        $article = new Article();
        $article->libelle = $request->libelle;
        $article->prix = $request->prix;
        $article->stock = $request->stock;
        $article->categorie_id = $request->categorie_id;
        $article->reference = $request->reference;
        $article->image = $request->image;
        $request->merge(["messages"=>"article ajouté avec succés"]);
        $article->save();
        return new ArticleCollection([$article]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Article::all();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, string $id)
    {
        //
        $article = Article::find($id);
        Article::where('id', $id)->update(["libelle" => $request->libelle,"prix"=>$request->prix,"image"=>$request->image,"stock"=>$request->stock,"reference"=>$request->reference,"categorie_id"=>$request->categorie_id]);
        $article->fournisseur()->sync($request->fournisseur);
        return Article::find($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        ArticleFournisseur::where('article_id', $id)->delete();
        Article::where('id', $id)->delete();
        return response()->json([
            "message" => "supprimé réussi",
            "data" => []
        ]);
    }

    public function allCategorieAndFournisseur(){
        return [Categorie::all(['id','libelle']),Fournisseur::all(['id','nom'])];
    }
}
