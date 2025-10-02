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
        Schema::table('profiles', function (Blueprint $table) {
            $table->string('profession', 60)->nullable()->after('photo');
            $table->string('about', 255)->nullable()->after('profession');
            $table->string('twitter', 100)->nullable()->after('about');
            $table->string('linkedin', 100)->nullable()->after('twitter');
            $table->string('facebook', 100)->nullable()->after('linkedin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['profession', 'about', 'twitter', 'linkedin', 'facebook']);
        });
    }
};
