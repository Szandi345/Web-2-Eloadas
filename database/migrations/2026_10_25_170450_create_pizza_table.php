<?php

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
        Schema::create('pizza', function (Blueprint $table) {
            $table->id('pizzaid');
			$table->string('nev');
			$table->unsignedBigInteger('kategoriaid');
			$table->foreign('kategoriaid')
			->references('kategoriaid')
			->on('kategoria');
			$table->boolean('vegetarianus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pizza');
    }
};
