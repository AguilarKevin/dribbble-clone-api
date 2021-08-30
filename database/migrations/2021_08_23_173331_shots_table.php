<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ShotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shots', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->default(null);
            $table->unsignedBigInteger('saves')->default(0);
            $table->unsignedBigInteger('views')->default(0);
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('shots');
    }
}
