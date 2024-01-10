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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        $qb = \DB::table('categories');
        $insert = [
            ['name' => '未設定 Undefined',],
            ['name' => '景観 Outdoor',],
            ['name' => 'ハウス Indoor',],
            ['name' => 'ゲーム Game',],
            ['name' => 'ホラー Horror',],
            ['name' => '展示 Display',],
            ['name' => 'アバター Avator',],
            ['name' => 'パーティ Celebration',],
            ['name' => '作業 Workplace',],
        ];
        $qb->insert($insert);   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
