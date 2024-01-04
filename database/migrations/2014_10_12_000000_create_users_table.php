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
            $table->id();
            $table->string('firstname', 20);
            $table->string('lastname', 20)->nullable();
            $table->string('email', 40)->unique();
            $table->string('address', 255);
            $table->unsignedBigInteger('nid')->unique();
            $table->unsignedBigInteger('contact');
            $table->string('password', 255);
            $table->string('role', 10);
            $table->rememberToken();
            $table->timestamps();
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
