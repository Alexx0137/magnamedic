<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identification_type_id')->constrained()->onDelete('cascade');
            $table->string('identification', 45);
            $table->string('name', 45);
            $table->string('last_name', 45)->nullable();
            $table->string('email', 100)->nullable();
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->string('password', 100)->nullable();
            $table->integer('state');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
