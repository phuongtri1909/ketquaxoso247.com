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
        Schema::table('posts_xsdp', function (Blueprint $table) {
            $table->unsignedBigInteger('province_id')->nullable()->after('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts_xsdp', function (Blueprint $table) {
            $table->dropForeign('province_id');
            $table->dropColumn('province_id');
        });
    }
};
