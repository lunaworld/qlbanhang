<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\KhoModel;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $proModel;
    private $khoModel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->proModel = new ProductModel();
        $this->khoModel = new KhoModel();
    }

    public function orderadd(){
        return view('order.add');
    }

    public function checkproduct(Request $p_request){
        $product_code = $p_request->input('product_code');
        //first tuc la lay phan tu dau tien
        //get se tra ve 1 mang phan tu, neu chi co 1 phan tu thi do la 
        //phan tu so 0
        $resutl = $this->proModel->where('product.product_code',$product_code)
                  ->leftJoin('kho','kho.product_code','product.product_code')->first();
        return $resutl;
    }
}