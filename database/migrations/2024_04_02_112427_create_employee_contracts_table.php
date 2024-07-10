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
        Schema::create('employee_contracts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->integer('contract_type_id');
            $table->integer('template_id')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->text('contract_description')->nullable();
            $table->integer('contract_value')->nullable();
            $table->string('status')->default('pending');;
            $table->longText('client_signature')->nullable();
            $table->longText('company_signature')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contracts');
    }
};
