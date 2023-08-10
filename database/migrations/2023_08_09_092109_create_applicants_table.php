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
        Schema::create('applicants', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained(table: 'employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('job_id')->constrained(table: 'jobs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->date('application_date');
            $table->string('status');

            $table->timestamp('withdrawn_at')->nullable();
            $table->timestamp('viewed_at')->nullable();
            $table->timestamp('rejected_at')->nullable();

            $table->date('interview_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('applicants');
    }
};
