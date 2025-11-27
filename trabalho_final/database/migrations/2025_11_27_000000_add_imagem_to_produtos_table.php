<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Verifica se a coluna já existe para evitar erro
        if (!Schema::hasColumn('produtos', 'imagem')) {
            Schema::table('produtos', function (Blueprint $table) {
                $table->string('imagem')->nullable()->after('preco');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('produtos', 'imagem')) {
            Schema::table('produtos', function (Blueprint $table) {
                $table->dropColumn('imagem');
            });
        }
    }
};