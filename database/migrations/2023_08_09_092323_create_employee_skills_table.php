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
        Schema::create('employee_skills', static function (Blueprint $table) {
            $table->id();

            $table->string('proficiency');
            $table->unsignedInteger('months_of_experience');

            $table->boolean('is_verified')->default(FALSE);

            $table->string('certificate_name')->nullable();
            $table->string('certificate_type')->nullable();
            $table->string('certificate_details')->nullable();
            $table->string('certificate_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('employee_skills');
    }
};
