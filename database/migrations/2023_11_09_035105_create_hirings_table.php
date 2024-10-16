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
        Schema::create('hirings', function (Blueprint $table) {
            $table->id();
            $table->integer('teacherId');
            $table->char('stuName', 40);
            $table->string('currentSchool');
            $table->char('gender' , 10);
            $table->char('parentName', 100);
            $table->char('customerPhone', 20);
            $table->string('customerAddress');
            $table->char('moneyPhoto', 100);
            $table->integer('fee');
            $table->char('teacherName' , 60);
            $table->char('tr_position', 60);
            $table->char('subject', 50);
            $table->boolean('confirm')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hirings');
    }
};
