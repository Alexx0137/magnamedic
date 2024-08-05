<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identification_type_id')->constrained('identification_types');
            $table->string('identification', 45);
            $table->string('name', 45);
            $table->string('last_name', 45)->nullable();
            $table->foreignId('blood_type_id')->constrained('blood_types');
            $table->foreignId('gender_id')->constrained('genders');
            $table->date('birth_date');
            $table->string('address', 255)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('state');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
