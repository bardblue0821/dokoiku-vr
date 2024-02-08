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
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('ichioshi')->default(0);
            $table->boolean('quest')->default(0);
            
            $table->boolean('pen')->default(0);
            $table->boolean('bed')->default(0);
            $table->boolean('vid')->default(0);
            $table->boolean('jlog')->default(0);
            $table->boolean('imgpad')->default(0);
            
            $table->boolean('heavy')->default(0);
            $table->boolean('hardtojoin')->default(0);
            $table->boolean('jumpscare')->default(0);
            $table->boolean('violence')->default(0);
            $table->boolean('sexual')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('ichioshi');
            $table->dropColumn('quest');

            $table->dropColumn('pen');
            $table->dropColumn('bed');
            $table->dropColumn('vid');
            $table->dropColumn('jlog');
            $table->dropColumn('imgpad');

            $table->dropColumn('heavy');
            $table->dropColumn('hardtojoin');
            $table->dropColumn('jumpscare');
            $table->dropColumn('violence');
            $table->dropColumn('sexual');
        });
    }
};
