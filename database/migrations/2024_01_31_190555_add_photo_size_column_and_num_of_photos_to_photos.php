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
        Schema::table('photos', function (Blueprint $table) {
            $table->integer('size1y')->after('link1')->nullable();
            $table->integer('size1x')->after('link1')->nullable();
            $table->integer('size2y')->after('link2')->nullable();
            $table->integer('size2x')->after('link2')->nullable();
            $table->integer('size3y')->after('link3')->nullable();
            $table->integer('size3x')->after('link3')->nullable();
            $table->integer('size4y')->after('link4')->nullable();
            $table->integer('size4x')->after('link4')->nullable();
            $table->integer('size5y')->after('link5')->nullable();
            $table->integer('size5x')->after('link5')->nullable();
            $table->integer('size6y')->after('link6')->nullable();
            $table->integer('size6x')->after('link6')->nullable();
            $table->integer('size7y')->after('link7')->nullable();
            $table->integer('size7x')->after('link7')->nullable();
            $table->integer('size8y')->after('link8')->nullable();
            $table->integer('size8x')->after('link8')->nullable();
            $table->integer('size9y')->after('link9')->nullable();
            $table->integer('size9x')->after('link9')->nullable();
            $table->integer('number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->dropColumn('size1x');
            $table->dropColumn('size1y');
            $table->dropColumn('size2x');
            $table->dropColumn('size2y');
            $table->dropColumn('size3x');
            $table->dropColumn('size3y');
            $table->dropColumn('size4x');
            $table->dropColumn('size4y');
            $table->dropColumn('size5x');
            $table->dropColumn('size5y');
            $table->dropColumn('size6x');
            $table->dropColumn('size6y');
            $table->dropColumn('size7x');
            $table->dropColumn('size7y');
            $table->dropColumn('size8x');
            $table->dropColumn('size8y');
            $table->dropColumn('size9x');
            $table->dropColumn('size9y');
            $table->dropColumn('number');
        });
    }
};
