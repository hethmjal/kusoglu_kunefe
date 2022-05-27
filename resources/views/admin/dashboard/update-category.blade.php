@extends('admin.layout.partials')
@section('content')
<div class="content">
    <div class="container">
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">تعديل التصنيف</div>
        <div class="card-body">
            <form method="POST" class="form-group"  action="{{route('category.update',$category->id)}}" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">التصنيف</label>
                    <input name="category" value="{{$category->category}}" type="text" placeholder="اسم التصنيف" class="form-control">
                </div>
                @error('category')
                <p class="invalid-feedback d-block"> {{$message}}</p>
                @enderror

              



                
            

               

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div>
   
</div>
    </div>
</div>
@endsection