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
        Schema::create('government_ids', static function (Blueprint $table) {
            $table->id();

            $table->string('government_id')->nullable();

            $table->boolean('is_verified')->default(FALSE);
            $table->date('verified_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('government_ids');
    }
};
