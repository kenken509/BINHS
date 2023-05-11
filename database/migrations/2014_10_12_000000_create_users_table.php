<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fName')->nullable();
            $table->string('mName')->nullable();
            $table->string('lName')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->enum('civilStatus',['single','married'])->nullable();
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->date('birthDate')->nullable();
            $table->integer('age')->nullable();
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); //password
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            //address columns
            $table->String('region')->nullable();
            $table->String('province')->nullable();
            $table->String('city')->nullable();
            $table->String('barangay')->nullable();
            $table->enum('role', ['admin','instructor','student','guest'])->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->rememberToken();
            // accountability
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->foreign('subject_id')->references('id')->on('subjects')->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
