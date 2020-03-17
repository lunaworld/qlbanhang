<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function add(){
        return view('product.add');
    }

    public function addpost(Request $p_request){
        echo 'bat dau xu ly';
        $filename = '';
        if ($p_request->hasFile('hinhanh')) {
            $file = $p_request->hinhanh;

            echo "đã vào đây";
            //Lấy Tên files
            echo 'Tên Files: ' . $file->getClientOriginalName();
            echo '<br/>';
            $filename = 'file'.date('yymdhis').'.png';
            //Lấy Đuôi File
            $df = $file->getClientOriginalExtension();
            echo 'Đuôi file: ' . $file->getClientOriginalExtension();
            echo '<br/>';
            // if($df !='png') {
            //     die('file ko hợp lệ');
            // }
            //Lấy đường dẫn tạm thời của file
            echo 'Đường dẫn tạm: ' . $file->getRealPath();
            echo '<br/>';

            //Lấy kích cỡ của file đơn vị tính theo bytes
            echo 'Kích cỡ file: ' . $file->getSize();
            echo '<br/>';

            //Lấy kiểu file
            echo 'Kiểu files: ' . $file->getMimeType();
            $file->move('upload', $filename );
        }
        $name = $p_request->input('name');
        $type = $p_request->input('type');
        $price = $p_request->input('price');
        $nhasanxuat = $p_request->input('nhasanxuat');
        $product_code = $p_request->input('product_code');
        
        $insert_value = ['name' => $name,
                         'type' => $type,
                          'price' => $price, 
                          'nhasanxuat' => $nhasanxuat,
                          'product_code' => $product_code,
                            'image' =>$filename ];
        $productmodel = new ProductModel();

        $productmodel->create($insert_value);
        // return view('product.add');
        
    }
}
