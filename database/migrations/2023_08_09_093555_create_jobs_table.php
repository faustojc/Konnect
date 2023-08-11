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
        Schema::create('jobs', static function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->mediumText('description');
            $table->string('job_type');
            $table->string('category')->nullable();
            $table->string('location')->nullable();

            $table->boolean('is_remote')->default(FALSE);

            $table->string('salary')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['open', 'filled', 'closed'])->default('open');
            $table->timestamp('posted_at')->useCurrent();

            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('jobs');
    }
};
