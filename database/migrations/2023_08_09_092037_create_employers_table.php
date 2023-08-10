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
        Schema::create('employers', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('company_name')->unique();
            $table->string('company_size')->nullable();
            $table->foreignId('industry_type');

            $table->mediumText('description');
            $table->year('founded');

            $table->text('address');
            $table->string('region');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');

            $table->string('website')->nullable();
            $table->json('social_links')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};
