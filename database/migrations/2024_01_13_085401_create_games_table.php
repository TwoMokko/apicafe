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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('photo')->nullable();
            $table->smallInteger('people_count_min')->default(0);
            $table->smallInteger('people_count_max')->default(0);
            $table->smallInteger('time_count_min')->default(0);
            $table->smallInteger('time_count_max')->default(0);
            $table->smallInteger('age');
            $table->string('rules');
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
