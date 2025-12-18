<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
              $table->integer('week'); // Week 1, 2, 3, 4
                $table->integer('day_in_week'); // Day 1, 2, 3 (within the week)
                $table->string('weekday'); // monday, tuesday, etc.
                $table->string('title');
                $table->string('time_range');
                $table->string('artist');
                $table->string('background_class')->nullable();
                $table->string('background_color')->nullable();
                $table->boolean('has_background_image')->default(false);
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
