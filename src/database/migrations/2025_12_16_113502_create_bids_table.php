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
        Schema::create('bids',  function(Blueprint $table){
            $table->id();
            $table->decimal('amount_auction', 20, 2);
            $table->decimal('amount_lot', 20, 2);
            $table->timestamp('time_lot_bid');
            $table->timestamp('time_auction_bid');
            $table->integer('lot_id');
            $table->foreign('lot_id')->references('id')->on('lots')->onDelete('cascade');
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
