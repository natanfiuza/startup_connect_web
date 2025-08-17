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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('sector');
            $table->text('description');
            $table->dateTime('event_date');
            $table->boolean('is_virtual')->default(false);
            $table->string('location')->nullable(); // Para eventos presenciais
            $table->string('registration_link', 2048);
            $table->string('image_url', 2048)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('events');
    }
};
