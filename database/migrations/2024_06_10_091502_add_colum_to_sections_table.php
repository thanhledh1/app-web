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
            $table->longText('text_1')->nullable();
            $table->longText('text_2')->nullable();
            $table->longText('text_3')->nullable();
            $table->longText('text_4')->nullable();
            $table->longText('text_5')->nullable();
            $table->longText('text_6')->nullable();
            $table->longText('text_7')->nullable();
            $table->longText('text_8')->nullable();
            $table->longText('text_9')->nullable();
            $table->longText('text_10')->nullable();

            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            //
            $table->longText('text_1');
            $table->longText('text_2');
            $table->longText('text_3');
            $table->longText('text_4');
            $table->longText('text_5');
            $table->longText('text_6');
            $table->longText('text_7');
            $table->longText('text_8');
            $table->longText('text_9');
            $table->longText('text_10');
        });
    }
};
