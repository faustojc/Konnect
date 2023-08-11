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
        Schema::create('profile_pictures', static function (Blueprint $table) {
            $table->id();

            $table->string('image_type');
            $table->string('filename');
            $table->string('mime_type');
            $table->float('size');
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->text('storage_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_picture');
    }
};
