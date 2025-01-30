<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_code', 50);
            $table->string('teacher_name', 50);
            $table->date('teacher_dob');
            $table->string('teacher_email', 200);
            $table->string('teacher_phone', 20);
            $table->text('teacher_profile');
            $table->text('address');
            $table->text('teacher_photo');
            $table->text('teacher_dec');

            // Foreign Keys
            $table->unsignedBigInteger('gender_id');
            // Foreign Key Constraints
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};


