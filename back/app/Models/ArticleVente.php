<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleVente extends Model
{
    use HasFactory;
    public function categorie(){
        return $this->belongsToMany(Article::class,'vente_confections');
    }

    protected static function booted()
    {
        static::created(function(ArticleVente $article){
            $article->categorie()->attach(request()->confection);
        });
    }
}
