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
        Schema::table('contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('tipo_contato_id')->nullable()->after('id');
            $table->foreign('tipo_contato_id')->references('id')->on('tipo_contatos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropForeign('contatos_tipo_contato_id_foreign');
            $table->dropColumn('tipo_contato_id');
        });
    }
};
