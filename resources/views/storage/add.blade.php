@extends('layouts.app')

@section('content')
<h1>Nhập Kho</h1>

<div class="container">
    <form method="get" action ="/checkproduct">
        @csrf
        Mã Sản Phẩm: <input name='product_code' type ='text' > <br/>
        <input type = 'submit' value ='check mã sản phảm'>
    </form>

    <form>
        Tên Sản Phẩm: <input name = 'name' type ='text' value ="<?php if(isset($result) && count($result)>0) echo $result[0]->name ?>"> <br/>
        
        Loại Sản Phẩm
        <select name ='type'>
            <option value ='Bút'> Bút</option>
            <option value ='Vở'> Vở</option>
            <option value ='Viết'> Viết</option>
            <option value = 'Mũ'> Mũ</option>
        </select><br/>
        Giá Sản Phẩm: <input  name = 'price' type ='number'> <br/>
        Nhà Sản Xuất: <input name ='nhasanxuat' type ='text'> <br/>
        <img src=''><br/>
        Số Lượng Hiện Tại: <input name ='soluonghientai' type ='text'> <br/>
        Số Lượng Nhập Thêm: <input name ='soluong' type ='text'> <br/>
        <input type ='submit' name = 'submit' class ='btn btn-primary' value ='gửi form'>
    </form>
</div>
@endsection
