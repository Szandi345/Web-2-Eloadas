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
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id('rendelesid');
			$table->unsignedBigInteger('pizzaid');
			$table->foreign('pizzaid')
			->references('pizzaid')
			->on('pizza');
			$table->integer('darab');
			$table->dateTime('felvetel')->nullable();
			$table->dateTime('kiszallitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};
