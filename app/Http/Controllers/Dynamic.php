<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Country;

class Dynamic extends Controller
{
     function index()
    {
      //  $country_list = DB::table('countries')
        //                        ->groupBy('country')
          //                      ->get(); 

    $country_list = Country::select('country')->groupBy('country')
   ->get();                
//dd($country_list);
                                return view('dynamic',compact('country_list'));
    }



     function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('countries')
                        ->where($select, $value)
                        ->groupBy($dependent)
                        ->get();
        $output = '<option value="">Select'.ucfirst($dependent).'</option>';

        foreach($data as $row)
        {
            $output .= '<option value="'.$row->dependent.'">
            '.$row->dependent.'</option>';
            echo $output;

        }
        
    }
}
