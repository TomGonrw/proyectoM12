<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cicles')
                ->nullable()
                ->constrained('cicles')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->string('nom');
            $table->string('cognom');
            $table->string('dni');
            $table->string('correu');
            $table->string('direccio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnes');
    }
}
