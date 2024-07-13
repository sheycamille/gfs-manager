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
        Schema::create('legal_dispute_consultants', function (Blueprint $table) {
            $table->id();
            $table->integer("legal_dispute_id");
            $table->string("name");
            $table->string("job_title")->nullable();
            $table->date("start_date")->nullable();
            $table->date("end_date")->nullable();
            $table->text("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_dispute_consultants');
    }
};
