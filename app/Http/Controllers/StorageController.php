<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\KhoModel;

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
        $result = $model->where('product.product_code','=',$product_code)
            ->leftJoin('kho','product.product_code','kho.product_code')
            ->get();
        $data['result'] = $result;
        return view('storage.add',$data);
        
    }

    public function update(Request $p_quest){
        $product_code = $p_quest->input('product_code');
        $khomodel = new KhoModel();
        $check = $khomodel->where('product_code','=',$product_code)->get();
        if(count($check)>0) {
            //da co product code tren bang kho -> update
        } else {
            //chua co product code tren bang kho -> insert
        }
        return redirect('/addstorage')->with('error','You have no permission for this page!');;
        //->xu ly sau khi tra ve
    }

    public function ajaxdemo() {
        return view('demoajax');
    }

    public function ajax(Request $p_quest) {
        
    }

}