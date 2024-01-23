<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketingManagementcontroller extends Controller
{
    public function marketStrategy(){
        return view('marketting.market-strategy');
    }

    public function marketCampaigns(){
        return view('marketting.market-campaign');
    }

      public function allPost(){
        return view('marketting.all-post');
    }

    public function createPost(){
        return view('marketting.create-post');
    }

    public function allCategoty(){
        return view('marketting.all-categories');
    }

    public function createCategories(){
        return view('marketting.create-categories');
    }
  
   
}
