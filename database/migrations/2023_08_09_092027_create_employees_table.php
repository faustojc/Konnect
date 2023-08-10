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
        Schema::create('employees', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('position_id')->nullable()->constrained('positions')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');

            $table->string('birthdate');
            $table->string('gender');

            $table->text('address');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');

            $table->string('civil_status');
            $table->string('contact_number')->nullable();
            $table->text('introduction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('employees');
    }
};
