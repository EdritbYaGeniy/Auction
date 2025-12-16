<?php

use App\Enums\bank_status;
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
        Schema::create('personal_bank', function(Blueprint $table){
            $table->id();
            $table->decimal('money_count', 20, 2);
            $table->timestamp('transaction_time');
            $bank_status = array_column(bank_status::cases(), 'value');
            $table->enum('transaction_status', $bank_status)->default(bank_status::Awaiting->value)->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
