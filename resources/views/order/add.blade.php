@extends('layouts.app')

@section('content')

<div class="container">
    <div id = 'chitiet'>
        <table>
            <thead>
                <tr>
                    <td>Ma SP</td>
                    <td>Ten SP</td>
                    <td>Gia</td>
                    <td>So Luong</td>
                    <td>Thanh Tien</td>
                </tr>
            </thead>
            <tbody id ='tbody'>
            <!-- <tr>
                    <td>Ma SP</td>
                    <td>Ten SP</td>
                    <td>Gia</td>
                    <td>So Luong</td>
                    <td>Thanh Tien</td>
                </tr> -->
            </tbody>
        </table>
        <button id = 'order-create'>tao don hang</button>
    </div>
    <div>
        ma sp
        <input id = 'product_code' class='class1'>
        ten sp
        <input id = 'name' readonly class='class1'>
        gia thanh
        <input id = 'price' readonly class='class1'>
        nhap so luong
        <input id = 'soluong' class='class1'>
        <button id = 'add_product' >Nhap</button>
    </div>
</div>
<script>
var soluong = 0;
$(document).ready(function(){
    //truy xuat class
    $('.class1').css('background','red');
    //
    $('#product_code').on('keypress',function(e) {
        if(e.which == 13) {
            let pc = $('#product_code').val();
            $.ajax({
            url : '/checkproduct',//duong dan
            type: 'GET',  // http method
            data: {product_code:pc},  // data to submit
            success: function (data) {
                console.log(data);
                console.log(data.name);
                $('#name').val(data.name);
                $('#price').val(data.price);
                //soluong la bien toan cuc khai bao o ngoai
                soluong = data.soluong ? data.soluong : 0;
                // cau o tren tuong duong voi menh de if o duoi
                // if(data.soluong != null) {
                //     soluong = data.soluong;
                // }else {
                //     soluong = 0;
                // }
            },
            error: function (data) {
                //goi ajax that bai
                    alert('error');
            }
        });
        }
    });
    $('#add_product').click(function(){
        let sl_nhapvao = $('#soluong').val();
        if(sl_nhapvao > soluong) {
            alert("so luong trong kho khong du");
            return false;
        }
        let product_code = $('#product_code').val();
        let tensp = $('#name').val();
        let price = $('#price').val();
        let sl = $('#soluong').val();

        let chuoi = $('#tbody').html();
                // <tr>
                //     <td>Ma SP</td>
                //     <td>Ten SP</td>
                //     <td>Gia</td>
                //     <td>So Luong</td>
                //     <td>Thanh Tien</td>
                // </tr> 
        chuoi += '<tr>';
        chuoi += '<td>'+product_code+'</td>';
        chuoi += '<td>'+tensp+'</td>';
        chuoi += '<td>'+price+'</td>';
        chuoi += '<td>'+soluong+'</td>';
        chuoi += '<td>'+price*soluong+'</td>';
        chuoi += '</tr>';
        $('#tbody').html(chuoi);  
    })

    $('#order-create').click(function(){
        alert('ttt');
    })


});
</script>
@endsection
