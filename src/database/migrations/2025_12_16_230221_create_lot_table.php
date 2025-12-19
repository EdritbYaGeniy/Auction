<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Lots;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lot', function(Blueprint $table){
            $table->id();
            $table->string('name', 255);
            $table->decimal('starting_price', 8, 2);
            $table->decimal('step_price', 8, 2);
            $table->decimal('end_price', 8, 2);
            $table->text('description');
            $lots_status = array_column(Lots::cases(), 'value');
            $table->enum('status', $lots_status)->default(Lots::AWAITING->value)->nullable();
            $table->time('end_lots_time');
            $table->time('starting_lot_time');
            $table->integer('auction_id');
            $table->foreign('auction_id')->references('id')->on('auction');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot');
    }
};
