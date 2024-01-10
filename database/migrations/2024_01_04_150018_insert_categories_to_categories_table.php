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
        $qb = \DB::table('categories');
            $insert = [
                ['category_name' => '未設定 Undefined',],
                ['category_name' => '景観 Outdoor',],
                ['category_name' => 'ハウス Indoor',],
                ['category_name' => 'ゲーム Game',],
                ['category_name' => 'ホラー Horror',],
                ['category_name' => '展示 Display',],
                ['category_name' => 'アバター Avator',],
                ['category_name' => 'パーティ Celebration',],
                ['category_name' => '作業 Workplace',],
            ];
        $qb->insert($insert);
    }

    /*
    <option value="未設定 Undefined">未設定 Undefined</option>
    <option value="景観 Outdoor">景観 Outdoor</option>
    <option value="ハウス Indoor">ハウス Indoor</option>
    <option value="ゲーム Game">ゲーム Game</option>
    <option value="ホラー Horror">ホラー Horror</option>
    <option value="展示 Display">展示 Display</option>
    <option value="アバター Avator">アバター Avator</option>
    <option value="パーティ Celebration">パーティ Celebration</option>
    <option value="Vket">Vket</option>
    <option value="作業 Workplace">作業 Workplace</option>
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
