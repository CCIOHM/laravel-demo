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
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id'); // === $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->on('users')
                ->references('id');

            $table->string('label', 128);
            $table->string('provider_name', 60);
            $table->string('provider_email', 60)->nullable();
            $table->float('price_ht');
            $table->float('buying_price')->nullable();
            $table->unsignedMediumInteger('quantity');
            $table->text('picture_path')->nullable();
            $table->text('description')->nullable();

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
