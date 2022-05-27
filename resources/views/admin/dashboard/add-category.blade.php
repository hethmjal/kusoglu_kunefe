@extends('admin.layout.partials')
@section('content')
<div class="content">
    <div class="container">
<div class="col-lg-6">
    <div class="card">
        <div class="card-header"><h4>اضافة تصنيف</h4></div>
        <div class="card-body">
            <form method="POST" class="form-group"  action="{{route('category.store')}}" accept-charset="utf-8">
                @csrf
                <div class="form-group">
                    <label for="name" class="sr-only">التصنيف</label>
                    <input name="category" type="text" placeholder="اسم التصنيف" class="form-control">
                    @error('name')
                <p class="invalid-feedback d-block"> {{$message}}</p>
                @enderror
                </div>
                            
                         

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">اضافة</button>
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