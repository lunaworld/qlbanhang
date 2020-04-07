@extends('layouts.app')

@section('content')
<div class="container">
<table>
<thead>
<tr>
<th>Ma SP</th>
<th>Gia Thanh</th>
<th>So luong</th>
<th>Thanh tien</th>
</tr>
</thead>
<tbody>
    @foreach($data as $item)
        <tr>
            <td>{{$item->product_code}}</td>
            <td>{{$item->giathanh}}</td>
            <td>{{$item->soluong}}</td>
            <td>{{$item->soluong*$item->giathanh}}</td>
        </tr>
    @endforeach
</tbody>
</table>
    
</div>
@endsection
