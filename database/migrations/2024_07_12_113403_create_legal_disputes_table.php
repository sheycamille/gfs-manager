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
        Schema::create('legal_disputes', function (Blueprint $table) {
            $table->id();
            $table->string("subject");
            $table->text("legal_basis")->nullable();
            $table->text("desired_outcome")->nullable();
            $table->date("complain_date")->nullable();
            $table->date("end_date")->nullable();
            $table->integer("status")->nullable()->default(0);
            $table->text("conclusion")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_disputes');
    }
};
