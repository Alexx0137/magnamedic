<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identification_type_id')->constrained('identification_types');
            $table->string('identification', 45);
            $table->string('name', 50);
            $table->string('last_name', 50)->nullable();
            $table->foreignId('gender_id')->constrained('genders');
            $table->string('address', 255)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->date('birth_date');
            $table->string('license_number', 50)->unique();
            $table->foreignId('medical_speciality_id')->constrained('medical_specialities');
            $table->integer('state');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
