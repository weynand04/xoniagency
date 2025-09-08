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
        Schema::create('services_pages', function (Blueprint $table) {
            $table->id();

            // Hero section
            $table->string('hero_h1')->nullable();
            $table->string('hero_h2')->nullable();
            $table->text('hero_p')->nullable();

            // Section 1 (What We Offer - cards)
            $table->string('sec1_h2')->nullable();
            $table->json('sec1_cards')->nullable(); // title, description, icon

            // Section 2 (How We Plan Our Work - steps)
            $table->string('sec2_h2')->nullable();
            $table->text('sec2_p')->nullable();
            $table->json('sec2_cards')->nullable(); // step, title, description

            // Section 3 (Skills & Expertise - progress)
            $table->string('sec3_h2')->nullable();
            $table->text('sec3_p')->nullable();
            $table->json('sec3_skills')->nullable(); // name, percentage

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_pages');
    }
};
