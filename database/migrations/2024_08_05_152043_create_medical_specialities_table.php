<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_specialities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('code', 10);
            $table->string('consulting_room', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medical_specialities');
    }
};
