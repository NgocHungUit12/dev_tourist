<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->nullable()->constrained();
            $table->foreignId('parent_id')->nullable()->constrained('tour_reviews');
            $table->foreignId('user_id')->constrained();
            $table->tinyInteger('rate')->nullable();
            $table->string('review');
            $table->enum('status', ['active','hidden']);
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
        Schema::dropIfExists('tour_reviews');
    }
}
