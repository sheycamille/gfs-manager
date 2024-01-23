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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_no');
            $table->string('shipper_name');
            $table->integer('shipper_phone');
            $table->string('shipper_address');
            $table->string('shipper_email');
            $table->string('receiver_name');
            $table->integer('receiver_phone');
            $table->string('receiver_address');
            $table->string('receiver_email');
            $table->string('type_of_shipment');
            $table->integer('weight');
            $table->string('packages');
            $table->string('mode_field');
            $table->string('product');
            $table->integer('qty');
            $table->string('payment_method');
            $table->string('attach_file');
            $table->integer('total_freight');
            $table->string('carrier_field');
            $table->integer('carrier_ref_number');
            $table->time('departure_time');
            $table->string('origin_field');
            $table->string('destination');
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->date('delivery_date');
            $table->string('comments');
            $table->date('status_date');
            $table->time('status_time');
            $table->string('status_location');
            $table->string('package_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
