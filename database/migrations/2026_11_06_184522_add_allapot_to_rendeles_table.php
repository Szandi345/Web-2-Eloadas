
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('rendeles', function (Blueprint $table) {
            $table->string('allapot', 50)
                  ->default('Új rendelés');
        });
    }

    public function down(): void
    {
        Schema::table('rendeles', function (Blueprint $table) {
            $table->dropColumn('allapot');
        });
    }
};
