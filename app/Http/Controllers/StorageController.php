<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class StorageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add() 
    {
        return view('storage.add');
    }
    
    public function check(Request $p_quest){
        $product_code = $p_quest->input('product_code');
        $model = new ProductModel();
        $result = $model->where('product_code','=',$product_code)
            ->get();
        $data['result'] = $result;
        
        return view('storage.add',$data);
        
    }

}