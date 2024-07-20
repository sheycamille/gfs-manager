<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppIntegrationController extends Controller
{
    public function index() {
        return view("apps-integration.index");
    }
}
