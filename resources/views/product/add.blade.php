@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action ="" enctype="multipart/form-data">
        @csrf
        Mã Sản Phẩm: <input name='product_code' type ='text' > <br/>
        Tên Sản Phẩm: <input name = 'name' type ='text'> <br/>
        
        Loại Sản Phẩm
        <select name ='type'>
            <option value ='Bút'> Bút</option>
            <option value ='Vở'> Vở</option>
            <option value ='Viết'> Viết</option>
            <option value = 'Mũ'> Mũ</option>
        </select><br/>
        Giá Sản Phẩm: <input  name = 'price' type ='number'> <br/>
        Nhà Sản Xuất: <input name ='nhasanxuat' type ='text'> <br/>
        Hình Ảnh : <input name = 'hinhanh' type='file' accept=".png,.jpg" >
        <input type ='submit' name = 'submit' class ='btn btn-primary' value ='gửi form'>
    </form>
</div>
@endsection
