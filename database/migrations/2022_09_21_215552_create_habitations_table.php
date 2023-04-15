<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('name')->nullable(true);
            $table->string('description')->nullable(true);
            $table->integer('price')->nullable(true);
            $table->integer('id_type_habitation')->nullable(true);
            $table->integer('id_part_type_habitation')->nullable(true);
            $table->decimal('latitude', 10, 7)->nullable(true);
            $table->decimal('longitude', 10, 7)->nullable(true);
            $table->string('city')->nullable(true);
            $table->string('street')->nullable(true);
            $table->integer('house')->nullable(true);
            $table->integer('floor')->nullable(true);
            $table->integer('count_guests')->nullable(true);
            $table->json('ids_advantages')->nullable(true);
            $table->json('ids_photo')->nullable(true);
            $table->integer('finished')->default(1);
            $table->integer('question')->default(1);
            $table->boolean('moderate')->default(false);
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
        Schema::dropIfExists('habitations');
    }
};
