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
        Schema::create('registered_lots', function(Blueprint $table){
            $table->id();
            $table->integer('user_id');
            $table->integer('auction_id');
            $table->integer('lot_id');
            $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('auction_id')->references('id')->on('auction')->onDelete('cascade');
            $table->foreign('lot_id')->references('id')->on('lot')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered_lot');
    }
};
