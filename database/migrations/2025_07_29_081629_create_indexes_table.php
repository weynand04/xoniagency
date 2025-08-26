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
        Schema::create('indexes', function (Blueprint $table) {
            $table->id();

            // Main section
            $table->string('main_h1')->nullable();
            $table->string('main_h2')->nullable();
            $table->text('main_p')->nullable();
            $table->string('main_button_text')->nullable();
            $table->string('main_button_link')->nullable();

            // Section 2 (3 card)
            $table->string('sec2_h2')->nullable();
            $table->text('sec2_p')->nullable();
            $table->json('sec2_cards')->nullable();

            // Section 3
            $table->string('sec3_h2')->nullable();
            $table->text('sec3_p')->nullable();
            $table->string('sec3_button_text')->nullable();
            $table->string('sec3_button_link')->nullable();
            $table->string('sec3_video_link')->nullable();

            // Section 4 (4 card)
            $table->string('sec4_h2')->nullable();
            $table->text('sec4_p')->nullable();
            $table->string('sec4_button_text')->nullable();
            $table->string('sec4_button_link')->nullable();
            $table->json('sec4_cards')->nullable();

            // Section 5 (4 card berisi h2 dan p)
            $table->json('sec5_cards')->nullable();

            // Section 6 (4 card img, h3, p)
            $table->string('sec6_h2')->nullable();
            $table->text('sec6_p')->nullable();
            $table->json('sec6_cards')->nullable();

            // Section 7
            $table->string('sec7_h2')->nullable();
            $table->text('sec7_p')->nullable();
            $table->string('sec7_button_text')->nullable();
            $table->json('sec7_cards')->nullable();

            // Section 8 (3 card)
            $table->string('sec8_h2')->nullable();
            $table->json('sec8_cards')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indexes');
    }
};
