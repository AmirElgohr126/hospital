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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->string('role')->default('admin'); // Default role for admins
            $table->string('status')->default('active'); // Default status for admins
            $table->string('profile_picture')->nullable(); // Optional profile picture
            $table->string('phone')->nullable(); // Optional phone number
            $table->string('address')->nullable(); // Optional address
            $table->string('city')->nullable(); // Optional city
            $table->string('country')->nullable(); // Optional country
            $table->string('postal_code')->nullable(); // Optional postal code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
