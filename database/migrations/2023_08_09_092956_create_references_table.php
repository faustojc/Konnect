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
        Schema::create('references', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('employer_id')->constrained('employers')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('relationship');
            $table->integer('rating')->nullable();
            $table->text('feedback');

            $table->string('contact_info');
            $table->string('status');
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
