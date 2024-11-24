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
        Schema::create('issues', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('computer_id');
            $table->foreign('computer_id')->references('id')->on('computers')->cascadeOnDelete();
            $table->string('reported_by',50)->nullable();
            $table->dateTime('reported_date')->nullable();
            $table->text('description');
            $table->enum('urgency',['Low','Medium','High']);
            $table->enum('status',['Open','In Progress','Resolved']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
