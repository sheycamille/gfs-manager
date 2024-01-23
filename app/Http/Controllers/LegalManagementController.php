<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalManagementController extends Controller
{
    public function disputeManagement(){

        return view('legal-management.dispute-management');
    }

    public function insuranceManagement(){

        return view('legal-management.insurance-management');
        
    }
}
