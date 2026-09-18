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
        Schema::create('modules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->default(1);
            $table->foreignUuid('subject_id')
                ->references('id')
                ->on('subjects')
                ->onDelete('cascade');

            $table->string('module_name');
            $table->Boolean('has_coding')->default(false);
            $table->Boolean('has_question_type')->default(false);
            $table->timestamps();

             $table->index(
                'subject_id',
                'modules_subject_id_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
