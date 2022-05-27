@extends('admin.layout.partials')
@section('content')


<br>
<div class="card mt-5 ml-5 mr-5 mb-5">
    <div class="card-header"> <h4> اضافة منتج</h4></div>
    <br>
    <div class="card-body">
        <form accept-charset="utf-8" enctype="multipart/form-data" method="POST" action="{{route('product.store')}}">
            @csrf
            <div class="form-group">
                <label for="name">المنتج</label>
                <input name="name" type="text" placeholder="اسم المنتج" class="form-control">
                @error('name')
                <p class="invalid-feedback d-block"> {{$message}}</p>
                @enderror
            </div>
           
            <div class="form-group">
                <label for="name">السعر</label>
                <input name="price" type="text" placeholder="السعر" class="form-control">
                @error('price')
                <p class="invalid-feedback d-block"> {{$message}}</p>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="name">الصورة</label>
                <input name="image" type="file"  class="form-control">
                @error('image')
                <p class="invalid-feedback d-block"> {{$message}}</p>
                @enderror
            </div>

           
            <div class="form-group">
                <label for="name">التصنيف</label>
                <select name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->category}}</option>
                    @endforeach
                </select>
            </div>




            <div class="form-group">

            <button type="submit" class="btn btn-primary">اضافة</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection