<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->unsignedInteger('user_id')->default(1);
            $table->string('phone_number')->nullable();
            $table->integer('num_guest')->nullable();
            $table->string('check_in_date')->nullable();
            $table->string('destination')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->default('In progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
