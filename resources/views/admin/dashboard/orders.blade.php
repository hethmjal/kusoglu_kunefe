@extends('admin.layout.partials')
@section('content')

@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif
            <div class="content">
                <div class="container">
                   
                    <div class="page-title">
                        <h3>الطلبات
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                      <th scope="col">الطلب</th>
                                      <th scope="col">الطاولة</th>
                                      <th scope="col">اجمالي السعر لكافة الطلبات</th>
                                      <th>تفاصيل الطلب</th>
                                      <th>الانتهاء من الطلب</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($orders as $order)
                                          
                                    <tr>
                                      <td></th>
                                      <td>{{$order->table}}</td>
                                      <td>{{$order->price}} ريال </td>
                                      <td>
                                    <details>
                                        <summary>تفاصيل الطلب </summary>
                                            <ul class="d-flex justify-content-between">
                                                <li>الاسم</li>
                                                <li>الكمية</li>
                                             
                                            </ul>
                                            @foreach ($order->children as $item)
                                                
                                            <ul class="d-flex justify-content-between">
                                                <li>{{$item->product->name}}</li>
                                                
                                                <li>{{$item->quantity}}</li>
                                             
                                            </ul>
                                            @endforeach

                                             
                                      </details> 
                                    </td>
                                    <td class="text-right">
                                        <form action="" class="confirmform_{{$order->id}}" id="form_">
                                            <input type="hidden"  name="_token" value="{{csrf_token()}}">
                                           
                                            <input type="checkbox" @if($order->status=='complete') checked @endif  class="form-control confirm" value="{{$order->id}}" name="order_id">
                                        </form>
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

    


    @push('js')
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
        }
    </script>
        <script>
            $('.confirm').click(function(){
            

           
             var id = $(this).val();
            
             //var class_form = ".confirmform_"+id ; //form class
            // console.log(class_form);

                var formData = new FormData($(".confirmform_"+id)[0]);          
                $.ajax({
                    type: 'post',
                    enctype: 'multipart/form-data',
                    url: "{{ route('order.confirm') }}",
                    data:formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        console.log(status);
                    },
                    error: function(reject) {
                       
                    }
                });
            });
            
        </script>
    @endpush
    @endsection