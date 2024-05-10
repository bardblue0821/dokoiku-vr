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
        DB::table('categories')->where('name', '未設定 Undefined')      ->update(['name' => '未設定']);
        DB::table('categories')->where('name', '景観 Outdoor')          ->update(['name' => '景観']);
        DB::table('categories')->where('name', 'ハウス Indoor')         ->update(['name' => 'ハウス']);
        DB::table('categories')->where('name', 'ゲーム Game')           ->update(['name' => 'ゲーム']);
        DB::table('categories')->where('name', 'ホラー Horror')         ->update(['name' => 'ホラー']);
        DB::table('categories')->where('name', '展示 Display')          ->update(['name' => '展示']);
        DB::table('categories')->where('name', 'アバター Avator')       ->update(['name' => 'アバター']);
        DB::table('categories')->where('name', 'パーティ Celebration')  ->update(['name' => 'パーティ']);
        DB::table('categories')->where('name', '作業 Workplace')        ->update(['name' => '作業']);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('categories')->where('name', '未設定')    ->update(['name' => '未設定 Undefined']);
        DB::table('categories')->where('name', '景観')      ->update(['name' => '景観 Outdoor']);
        DB::table('categories')->where('name', 'ハウス')    ->update(['name' => 'ハウス Indoor']);
        DB::table('categories')->where('name', 'ゲーム')    ->update(['name' => 'ゲーム Game']);
        DB::table('categories')->where('name', 'ホラー')    ->update(['name' => 'ホラー Horror']);
        DB::table('categories')->where('name', '展示')      ->update(['name' => '展示 Display']);
        DB::table('categories')->where('name', 'アバター')  ->update(['name' => 'アバター Avator']);
        DB::table('categories')->where('name', 'パーティ')  ->update(['name' => 'パーティ Celebration']);
        DB::table('categories')->where('name', '作業')      ->update(['name' => '作業 Workplace']);
    }
};
