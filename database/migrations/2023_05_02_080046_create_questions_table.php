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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->enum('question_type',['multiple_choices','fill_in_the_blank', 'true/false', 'matching', 'essay']);
            $table->string('correct_answer');
            $table->string('true_or_false_answer')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated-by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
