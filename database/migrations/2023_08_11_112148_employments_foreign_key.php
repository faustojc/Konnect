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
        Schema::table('employments', static function (Blueprint $table) {
            $table->foreignId('employee_id')->constrained('employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('employer_id')->constrained('employers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('job_id')->nullable()->constrained('jobs')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employments', static function (Blueprint $table) {
            $table->dropForeign(['employee_id']);
            $table->dropForeign(['employer_id']);
            $table->dropForeign(['job_id']);
        });
    }
};
