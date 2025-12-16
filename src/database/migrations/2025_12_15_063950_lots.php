<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\lots_status;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lots', function(Blueprint $table){
           $table->id();
           $table->string('name', 255);
           $table->decimal('starting_price', 8, 2);
           $table->decimal('step_price', 8, 2);
           $table->decimal('end_price', 8, 2);
           $table->text('description');
           $lots_status = array_column(lots_status::cases(), 'value');
           $table->enum('status', $lots_status)->default(lots_status::Awaiting->value)->nullable();
           $table->time('end_lots_time');
           $table->time('starting_lot_time');
           $table->foreign('auctions_id')->references('id')->on('auctions');

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
