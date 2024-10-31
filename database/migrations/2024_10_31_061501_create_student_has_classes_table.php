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
        Schema::create('student_has_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')->references('id')->on('students')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('home_rooms_id');
            $table->foreign('home_rooms_id')->references('id')->on('home_rooms')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('periode_id');
            $table->foreign('periode_id')->references('id')->on('periodes')->cascadeOnUpdate()->cascadeOnDelete();

            $table->boolean('is_open')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_has_classes');
    }
};
