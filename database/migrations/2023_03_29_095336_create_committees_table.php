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
        Schema::create('committees', function (Blueprint $table) {
            $table->id();
            $table->boolean('type');
            $table->string('name');
            $table->string('short_name');
            $table->timestamp('effect_date')->nullable();
            $table->timestamp('restructuring_date')->nullable();
            $table->integer('meeting_frequency')->nullable();
            $table->unsignedBigInteger('chair_person')->nullable();
            $table->unsignedBigInteger('secratory')->nullable();
            $table->timestamps();

            // $table->foreign('chair_person')->references('id')->on('committee_members')->nullOnDelete();
            // $table->foreign('secratory')->references('id')->on('committee_members')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committees');
    }
};
