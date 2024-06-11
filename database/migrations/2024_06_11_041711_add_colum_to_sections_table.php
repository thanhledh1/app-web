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
        Schema::table('sessions', function (Blueprint $table) {
            //
            $table->longText('image_1')->nullable();
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->longText('image_4')->nullable();
            $table->longText('image_5')->nullable();
            $table->longText('image_6')->nullable();
            $table->longText('image_7')->nullable();
            $table->longText('image_8')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            //
            $table->longText('image_1')->nullable();
            $table->longText('image_2')->nullable();
            $table->longText('image_3')->nullable();
            $table->longText('image_4')->nullable();
            $table->longText('image_5')->nullable();
            $table->longText('image_6')->nullable();
            $table->longText('image_7')->nullable();
            $table->longText('image_8')->nullable();
        });
    }
};
