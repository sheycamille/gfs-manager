<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BussinessDevelopmentCOntroller extends Controller
{
    public function prospecting(){
        
        return view('bussiness-development.Prospecting-management');
    }

    public function customerRelationship(){

        return view('bussiness-development.Customer-relationship-management');
    }

    public function salesOpportunity(){

        return view('bussiness-development.Sales-opportunity-management');
    }
}
