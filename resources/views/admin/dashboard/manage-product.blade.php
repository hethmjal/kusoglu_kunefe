@extends('admin.layout.partials')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<br>
<div class="container mt-5">
  <div class="container">
    <a class="btn btn-primary" href="{{route('product.add')}}">اضافة منتج جديد</a>
</div>
<br>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col"></th>
        <th scope="col">المنتج</th>
        <th scope="col">السعر</th>
        <th scope="col">التصنيف</th>
        <th scope="col">الصورة</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php $x =1; ?>
    @foreach ($products as $product)
    <tr>
        <th scope="row"><?php  echo $x++; ?></th>
        <td>{{$product->name}}</td>
        <td>  {{$product->price}} ريال </td>
        <td>{{$product->category->category}}</td>
        <td>
            <img width="100px" height="100px" src="{{asset('uploads/'.$product->image)}}" />
        </td>
        <td>
            <a class="btn btn-primary" href="{{route('product.edit',$product->id)}} ">تعديل</a>
            <a class="btn btn-danger" href="{{route('product.destroy',$product->id)}} ">حذف</a>
        </td>
      </tr>
    
    @endforeach
    </tbody>
  </table>
  
</div>
  @endsection