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
        Schema::table('users', static function (Blueprint $table) {
            $table->foreignId('government_id')->nullable()->constrained('government_ids')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('profile_picture_id')->nullable()->constrained('profile_pictures')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropForeign(['government_id']);
            $table->dropForeign(['profile_picture_id']);
        });
    }
};
