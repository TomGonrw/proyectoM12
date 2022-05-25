<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumne_id')
                ->nullable()
                ->constrained('alumnes')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreignId('uf_id')
                ->nullable()
                ->constrained('ufs')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
            $table->integer('nota');
            $table->string('comentaris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
