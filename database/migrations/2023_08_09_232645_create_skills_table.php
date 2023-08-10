<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', static function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('category');
            $table->text('description')->nullable();

            $table->integer('popularity')->default(0);
            $table->string('average_proficiency')->nullable();
            $table->json('certifying_authorities')->nullable();
            $table->integer('number_of_verified')->default(0);

            $table->text('search_terms')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('sources')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
