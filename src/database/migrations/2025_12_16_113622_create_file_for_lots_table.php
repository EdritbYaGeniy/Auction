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
        Schema::create('file_for_lots', function(Blueprint $table){
            $table->id();
            $table->string('name', 255);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->integer('user_id');
            $table->integer('auction_id');
            $table->integer('lot_id');
            $table->integer('bid_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bid_id')->references('id')->on('bids')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
