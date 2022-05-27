@extends('admin.layout.partials')
@section('content')
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
<br>
            <div class="content">
                <div class="container">
                    <div>
                        <a class="btn btn-primary" href="{{route('category.add')}}">اضافة تصنيف</a>
                    </div>
                    <br>
                    <div class="page-title">
                        <h3>التصنيفات
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>التصنيف</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr>
                                        <td><h5>{{$category->category}}</h5></td>          
                                         <td class="text-right">
                                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>
                                            <a href="{{route('category.destroy',$category->id)}}" class="btn btn-outline-danger btn-rounded"><i class="fas fa-trash"></i></a>
                                        </td>
                                
                                    </tr>
                                    
                                    
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection