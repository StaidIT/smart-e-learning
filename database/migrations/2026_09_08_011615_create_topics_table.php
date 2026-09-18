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
        Schema::create('topics', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('order')->default(1);
            $table->foreignUuid('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');

            $table->string('topic_name');
            $table->string('slug');
            $table->timestamps();

             $table->index(
                'module_id',
                'topics_module_id_index'
            );

            

            $table->unique(
                'slug',
                'topics_slug_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
