@extends('layouts.app')

@section('content')
<h1>Nhập Kho</h1>


<div class="container">
@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
@endif
    <form method="get" action ="/checkproduct">
        Mã Sản Phẩm: <input name='product_code' type ='text' > <br/>
        <input type = 'submit' value ='check mã sản phảm' value ="<?php if(isset($result) && count($result)>0) echo $result[0]->product_code ?>">
    </form>

    <form method="get" action ="/updatekho">
        Tên Sản Phẩm: <input disabled name = 'name' type ='text' value ="<?php if(isset($result) && count($result)>0) echo $result[0]->name ?>"> <br/>
        <input name='product_code' type ='hidden' value ="<?php if(isset($result) && count($result)>0) echo $result[0]->product_code ?>" >
        Loại Sản Phẩm
        <select name ='type' disabled>
            <option value ='Bút'> Bút</option>
            <option value ='Vở'> Vở</option>
            <option value ='Viết'> Viết</option>
            <option value = 'Mũ'> Mũ</option>
        </select><br/>
        Giá Sản Phẩm: <input  disabled name = 'price' type ='number' value ="<?php if(isset($result) && count($result)>0) echo $result[0]->price ?>"> <br/>
        Nhà Sản Xuất: <input disabled name ='nhasanxuat' type ='text'> <br/>
        <img src=''><br/>
        Số Lượng Hiện Tại: <input name ='soluonghientai' type ='text' value= "<?php if(isset($result) && count($result)>0) echo $result[0]->soluong ? $result[0]->soluong : '0' ?>"> <br/>
        Số Lượng Nhập Thêm: <input name ='soluong' type ='text'> <br/>
        <input type ='submit' name = 'submit' class ='btn btn-primary' value ='gửi form'>
    </form>
</div>
@endsection
