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
        Schema::create('positions', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('employed_id')->nullable()->constrained('employed')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('name');
            $table->string('level');

            $table->string('current_position')->nullable();

            $table->json('search_terms');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
