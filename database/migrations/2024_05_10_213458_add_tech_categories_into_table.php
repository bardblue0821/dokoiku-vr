<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('tech_categories')->insert(['id' => 1, 'name' => 'アバター']);
        DB::table('tech_categories')->insert(['id' => 2, 'name' => 'ワールド']);
        DB::table('tech_categories')->insert(['id' => 3, 'name' => 'VR機器']);
        DB::table('tech_categories')->insert(['id' => 4, 'name' => 'PC周辺']);
        DB::table('tech_categories')->insert(['id' => 5, 'name' => 'Unity']);
        DB::table('tech_categories')->insert(['id' => 6, 'name' => 'Blender']);
        DB::table('tech_categories')->insert(['id' => 7, 'name' => 'その他']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tech_categories', function (Blueprint $table) {
            DB::table('tech_categories')->where('id', '1')->delete();
            DB::table('tech_categories')->where('id', '2')->delete();
            DB::table('tech_categories')->where('id', '3')->delete();
            DB::table('tech_categories')->where('id', '4')->delete();
            DB::table('tech_categories')->where('id', '5')->delete();
            DB::table('tech_categories')->where('id', '6')->delete();
            DB::table('tech_categories')->where('id', '7')->delete();
        });
    }
};
