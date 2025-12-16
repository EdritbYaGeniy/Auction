<?php

use App\Enums\role_name;
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
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('second_name', 50);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->integer('age');
            $status = array_column(role_name::cases(), 'value');
            $table->enum('role', $status)->default(role_name::Unauthorized->value)->nullable();
            $table->string('refresh_token', 256);
            $table->integer('avatar_image_id');
            $table->foreign('avatar_image_id')->references('id')->on('image')->onDelete('cascade')->onUpdate('cascade');
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
