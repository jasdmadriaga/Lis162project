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
        Schema::create('holds', function (Blueprint $table) {
            $table->id('hold_id');
            $table->string('hold_status', 255);
            $table->unsignedBigInteger('student_id');
                $table->foreign('student_id')->references('student_id')->on('students');
            $table->unsignedBigInteger('resource_id');
                $table->foreign('resource_id')->references('resource_id')->on('resources');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holds');
    }
};
