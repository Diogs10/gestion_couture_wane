<?php

use App\Models\Categorie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('article_ventes', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->foreignIdFor(Categorie::class)->constrained()->cascadeOnDelete();
            $table->integer('promo')->default(0);
            $table->string('reference');
            $table->longText('image');
            $table->double('prix_fabrication');
            $table->double('prix_vente');
            $table->double('marge');
            $table->integer('quantite_AV')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_ventes');
    }
};
