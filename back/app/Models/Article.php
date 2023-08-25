<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Article extends Model
{
    use HasFactory;

    public function fournisseur(){
        return $this->belongsToMany(Fournisseur::class,'article_fournisseurs');
    }

    protected static function booted()
    {
        static::created(function(Article $article){
            $article->fournisseur()->attach(request()->fournisseur);
        });
    }

    public function categorie():BelongsTo{
        return $this->belongsTo(Categorie::class);
    }
}
