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
        Schema::create('auction_member', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('auction_id');
            $table->foreign('user_id')->references('id')->on('user')->OnDelete('cascade');
            $table->foreign('auction_id')->references('id')->on('auction')->OnDelete('cascade');
            $table->primary('user_id', 'auction_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_member');
    }
};
