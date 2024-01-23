<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class ShipmentController extends Controller
{
    public function create()
    {

        return view('shipment.add_shipment');
    }

    public function store(Request $request)
    {

        try {

            $shipments = Shipment::whereNotNull('tracking_no')->get();
    
            foreach ($shipments as $shipment) {
                if ($shipment->tracking_no == $request->tracking_no) {
                    return redirect()->back()->with('error', 'Tracking number already exists');
                }
            }

            $shipment = new Shipment();

            $path = null;

            if ($request->hasFile('attach_file')) {

            $file = $request->file('attach_file');
            $itemRef = Str::uuid()->toString();
            $fileName = $itemRef.$file->getClientOriginalName();
            $file->move(public_path('/assets/images/shipment-files'), $fileName);

            $path = '/assets/images/shipment-files' . '/' . $fileName;
            }
            
            $shipment->tracking_no = $request->tracking_no;
            $shipment->shipper_name = $request->shipper_name;
            $shipment->shipper_phone = $request->shipper_phone;
            $shipment->shipper_address = $request->shipper_address;
            $shipment->shipper_email = $request->shipper_email;
            $shipment->receiver_name = $request->receiver_name;
            $shipment->receiver_phone = $request->receiver_phone;
            $shipment->receiver_address = $request->receiver_address;
            $shipment->receiver_email = $request->receiver_email;
            $shipment->type_of_shipment = $request->type_of_shipment;
            $shipment->weight = $request->weight;
            $shipment->packages = $request->packages;
            $shipment->mode_field = $request->mode_field;
            $shipment->product = $request->product;
            $shipment->attach_file = $path;
            $shipment->qty = $request->qty;
            $shipment->payment_method = $request->payment_method;
            $shipment->total_freight = $request->total_freight;
            $shipment->carrier_field = $request->carrier_field;
            $shipment->carrier_ref_number = $request->carrier_ref_number;
            $shipment->departure_time = $request->departure_time;
            $shipment->origin_field = $request->origin_field;
            $shipment->destination = $request->destination;
            $shipment->pickup_date = $request->pickup_date;
            $shipment->pickup_time = $request->pickup_time;
            $shipment->delivery_date = $request->delivery_date;
            $shipment->comments = $request->comments;
            $shipment->status_date = $request->status_date;
            $shipment->status_time = $request->status_time;
            $shipment->status_location = $request->status_location;
            $shipment->package_status = $request->package_status;
            $shipment->save();

    
            return redirect()->back()->with('success', 'Successfully saved');

        } catch (\Throwable $th) {

            Log::error($th);

            return redirect()->back()->with('error', 'An error occurred while saving the shipment');
        }

    }
    public function edit($id){
        $id = Crypt::decrypt($id);
        $shipment = Shipment::findOrfail($id);

        return view('shipment.edit_shipment',[
            'shipment'=> $shipment
        ]);
    }

    public function update(Request $request,$id){


        try {

          

            $shipment = Shipment::findOrfail($id);


            $path = null;

            if ($request->hasFile('attach_file')) {

            $file = $request->file('attach_file');
            $itemRef = Str::uuid()->toString();
            $fileName = $itemRef.$file->getClientOriginalName();
            $file->move(public_path('/assets/images/shipment-files'), $fileName);

            $path = '/assets/images/shipment-files' . '/' . $fileName;
            }
            
            $shipment->tracking_no = $request->tracking_no;
            $shipment->shipper_name = $request->shipper_name;
            $shipment->shipper_phone = $request->shipper_phone;
            $shipment->shipper_address = $request->shipper_address;
            $shipment->shipper_email = $request->shipper_email;
            $shipment->receiver_name = $request->receiver_name;
            $shipment->receiver_phone = $request->receiver_phone;
            $shipment->receiver_address = $request->receiver_address;
            $shipment->receiver_email = $request->receiver_email;
            $shipment->type_of_shipment = $request->type_of_shipment;
            $shipment->weight = $request->weight;
            $shipment->packages = $request->packages;
            $shipment->mode_field = $request->mode_field;
            $shipment->product = $request->product;
            $shipment->attach_file = $path;
            $shipment->qty = $request->qty;
            $shipment->payment_method = $request->payment_method;
            $shipment->total_freight = $request->total_freight;
            $shipment->carrier_field = $request->carrier_field;
            $shipment->carrier_ref_number = $request->carrier_ref_number;
            $shipment->departure_time = $request->departure_time;
            $shipment->origin_field = $request->origin_field;
            $shipment->destination = $request->destination;
            $shipment->pickup_date = $request->pickup_date;
            $shipment->pickup_time = $request->pickup_time;
            $shipment->delivery_date = $request->delivery_date;
            $shipment->comments = $request->comments;
            $shipment->status_date = $request->status_date;
            $shipment->status_time = $request->status_time;
            $shipment->status_location = $request->status_location;
            $shipment->package_status = $request->package_status;
            $shipment->save();

    
            return redirect()->back()->with('success', 'Successfully Updated');

        } catch (\Throwable $th) {

            Log::error($th);

            return redirect()->back()->with('error', 'An error occurred while saving the shipment');
        }

    }

    public function destroy($id){

        $shipment = Shipment::findOrfail($id);
        $shipment->delete();
        return redirect()->back()->with('success', 'Shipment successfully deleted.');


    }

    public function allShipment(Request $request){

        $shipper_names = Shipment::distinct()->pluck('shipper_name')->all();
        $receiver_names = Shipment::distinct()->pluck('receiver_name')->all();

        $shipments = Shipment::query();

        if ($request->status) {
            $shipments->orWhere('package_status', $request->status);
        }
    
        if ($request->shipper_name) {
            $shipments->orWhere('shipper_name', $request->shipper_name);
        }
    
        if ($request->receiver_name) {
            $shipments->orWhere('receiver_name', $request->receiver_name);
        }
    
        $shipments = $shipments->get();

        return view('shipment.all_shipment',[
            'shipments' => $shipments,
            'shipper_names'=> $shipper_names,
            'receiver_names'=> $receiver_names,
        ]);
    }

    public function trackShipment(Request $request){
        if($request->tracking_no == true){
            
            $shipment = Shipment::where('tracking_no', $request->tracking_no)->first();

            if($shipment){

                return view('shipment.track_shipment',[
                    'shipment' => $shipment
                ]);
            }
           return redirect()->back()->with('error', 'No Tracking Result Found');

        }else{

            $shipment = Shipment::where('tracking_no', $request->tracking_no)->first();

            return view('shipment.track_shipment',[
                'shipment' =>$shipment
            ]);

        }
    }

    public function dashboard(){

       

        return view('shipment.dashboard');
    }
}
