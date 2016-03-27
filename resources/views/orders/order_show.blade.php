@extends("layouts.master")
@section("title",$title)
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>#{{ $order->id }}</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">

                            <tbody>
                            <tr>
                                <th width="100">Order ID</th>
                                <td align="left" width="20">:</td>
                                <td align="left">#{{ $order->id }}</td>

                            </tr>
                            <tr>
                                <th width="100">Fullname</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->fullname }}</td>
                            </tr>
                            <tr>
                                <th width="100">Email</th>
                                <td align="left" width="20">:</td>
                                <td align="left">#{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th width="100">Phone</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <th width="100">Address</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <th width="100">Product</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->product->p_name }}</td>
                            </tr>
                            <tr>
                                <th width="100">Product Category</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->product->category->cat_name }}</td>
                            </tr>
                            <tr>
                                <th width="100">Qty</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->qty }}</td>
                            </tr>
                            <tr>
                                <th width="100">Price</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ number_format($order->price) }}</td>
                            </tr>
                            <tr>
                                <th width="100">Created at</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th width="100">Last Updated</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $order->updated_at }}</td>
                            </tr>
                            <tr>
                                <th width="100">Status</th>
                                <td align="left" width="20">:</td>
                                <td align="left">
                                    {!!  \Expresskoreanmotor\Libraries\Customlib::gen_status_order($order->status) !!}
                                    @if($order->status == 0)
                                        <a style="cursor: pointer;" id="process-order" data-id="{{ $order->id }}" data-token="{{ csrf_token() }}">Process ?</a>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
@endsection
@section("custom_js")
    <script>
        $(document).ready(function() {
            $('#process-order').on('click',function(){
                var _conf = confirm("Process this order ?");
                if(_conf){
                    var order_id = $(this).data('id');
                    var token = $(this).data('token');


                    $.ajax({
                        url:'{{ route('order.update') }}',
                        type: 'post',
                        data: {_method: 'put', _token :token,id:order_id}
                    }).done(function(){
                        window.location = '{{ route("order.list") }}';
                    });
                }

            });
        });
    </script>
@endsection