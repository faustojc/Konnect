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
        Schema::create('educations', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('school_id')->nullable()->constrained('employers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('school_name');
            $table->string('degree');
            $table->string('field_of_study');

            $table->date('start_date');
            $table->date('end_date')->nullable();

            $table->string('grade')->nullable();
            $table->string('activities', 700)->nullable();
            $table->string('description', 1000)->nullable();

            $table->string('attachment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('educations');
    }
};
