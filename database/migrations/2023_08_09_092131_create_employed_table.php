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
        Schema::create('employed', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('employer_id')->constrained('employers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('employee_id')->constrained('employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('job_id')->nullable()->constrained('jobs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('job_title');
            $table->string('department');

            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('currently_employed')->default(TRUE);

            $table->string('employment_type');
            $table->string('employment_status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employed');
    }
};
