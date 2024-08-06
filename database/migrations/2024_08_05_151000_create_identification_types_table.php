<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationTypesTable extends Migration
{
    public function up()
    {
        Schema::create('identification_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->string('code', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('identification_types');
    }
}