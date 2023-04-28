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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fName');
            $table->string('mName');
            $table->string('lName');
            $table->enum('gender',['male','female']);
            $table->enum('civilStatus',['single','married']);
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phoneNumber');
            $table->string('birthDate');
            $table->string('password')->default('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'); //password
            $table->string('fatherName')->nullable();
            $table->string('motherName')->nullable();
            //address columns
            $table->String('region');
            $table->String('province');
            $table->String('city');
            $table->String('barangay');
            $table->enum('role', ['admin','instructor','student' ]);
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
