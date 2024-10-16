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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->char('position', 50);
            $table->char('subject', 100);
            $table->integer('salary');
            $table->string('photo')->nullable();
            $table->char('name', 75);
            $table->char('email',75);
            $table->char('phno', 30);
            $table->char('gender', 30);
            $table->string('stuIDcard')->nullable();
            $table->char('academicYear',75);
            $table->char('major',30);
            $table->string('address');
            $table->char('experience', 50);
            $table->string('section1')->nullable();
            $table->string('section2')->nullable();
            $table->string('section3')->nullable();
            $table->string('section4')->nullable();
            $table->integer('confirm')->default(2);
            $table->integer('vacancyNo')->nullable();
            $table->boolean('hiring_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
