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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('username')->unique(); // Email as username
            $table->string('password'); // Encrypted password
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamp('registration_date')->default(now());
            $table->boolean('is_approved')->default(false); // Default false, needs admin approval
            $table->enum('role', ['admin', 'contributor'])->default('contributor'); // Default role is contributor
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
