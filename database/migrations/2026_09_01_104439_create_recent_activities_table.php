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
        Schema::create('recent_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('action');
            $table->string('subject')->nullable();
            $table->string('topic')->nullable();
            $table->string('target')->nullable();
            $table->string('from_role')->nullable();
            $table->string('to_role')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recent_activities');
    }
};
