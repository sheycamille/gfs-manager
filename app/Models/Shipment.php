<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [

        'tracking_no',
        ' shipper_name',
        ' shipper_phone',
        'shipper_address ',
        ' shipper_email',
        ' receiver_name',
        ' receiver_phone',
        ' receiver_address',
        ' receiver_email',
        ' type_of_shipment',
        ' weight',
        ' packages',
        ' mode_field',
        ' product',
        ' attach_file',
        ' qty',
        ' payment_method',
        ' total_freight',
        ' carrier_ref_number',
        ' departure_time',
        ' origin_field',
        ' destination',
        ' pickup_date',
        ' pickup_time',
        ' delivery_date',
        ' comments',
        ' status_date',
        ' status_time',
        ' status_location',
        ' package_status',
    ];
    
}
