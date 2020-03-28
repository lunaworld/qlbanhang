<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\KhoModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use Illuminate\Support\Facades\Auth;

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
    public function addnew(Request $p_request){
        $data = $p_request->input('data');
        $money = $p_request->input('money');
        $user_id = Auth::user()->id;
        //insert Order
        $orderModel = new OrderModel();

        $insert_value = ['money'=>$money,'user_id'=>$user_id,'customer_name'=>'anh K'];
        $orderModel = new OrderModel();
        $order_id = $orderModel->create($insert_value);
        $order_id = $order_id->order_id;
        //insert Odrer Detail
        $data_insert = [];
        foreach($data as $item){
            $insert_value = [
                'order_id' => $order_id,
                'product_code' => $item['product_code'],
                'soluong' => $item['soluong'],
                'giathanh' => $item['price']
            ];
            $data_insert[] = $insert_value;
        }
        $orderDetailModel = new OrderDetailModel();
        $result = $orderDetailModel->insert($data_insert);
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