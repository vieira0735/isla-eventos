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
    Schema::table('eventos', function (Blueprint $table) {
        $table->foreignId('tipo_id')->nullable()->after('titulo')
            ->constrained()->nullOnDelete();
        $table->dropColumn('tipo');
    });
}

public function down(): void
{
    Schema::table('eventos', function (Blueprint $table) {
        $table->string('tipo', 20)->default('')->after('titulo');
        $table->dropConstrainedForeignId('tipo_id');
    });
}
};
