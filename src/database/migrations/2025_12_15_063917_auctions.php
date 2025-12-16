<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\auction_status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auctions', function(Blueprint $table){
            $table->id();
            $table->string('title', 100);
            $table->decimal('starting_price', 8, 2);
            $table->decimal('step_price', 8, 2);
            $table->text('description');
            $auction_status = array_column(auction_status::cases(), 'value');
            $table->enum('auction_status', $auction_status)->default(auction_status::Awaiting)->nullable();
            $table->time('starting_lot_time');
            $table->time('end_lot_time');
            $table->boolean('deposit_paid')->default('false');
            $table->decimal('deposit_amount', 8, 2);
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('image_id')->references('id')->on('image')->onUpdate('cascade');
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
