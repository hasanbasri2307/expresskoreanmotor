@extends("layouts.master")
@section("title",$title)
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   <b>{{ $product->p_name }}</b>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table">

                            <tbody>
                            <tr>
                                <th width="100">Product ID</th>
                                <td align="left" width="20">:</td>
                                <td align="left">#{{ $product->id }}</td>

                            </tr>
                            <tr>
                                <th width="100">Product Name</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $product->p_name }}</td>
                            </tr>
                            <tr>
                                <th width="100">Category</th>
                                <td align="left" width="20">:</td>
                                <td align="left">#{{ $product->category->cat_name }}</td>
                            </tr>
                            <tr>
                                <th width="100">Price</th>
                                <td align="left" width="20">:</td>
                                <td align="left">Rp {{ number_format($product->price) }}</td>
                            </tr>
                            <tr>
                                <th width="100">Discount</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ number_format($product->discount) }} %</td>
                            </tr>
                            <tr>
                                <th width="100">Description</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th width="100">Tags</th>
                                <td align="left" width="20">:</td>
                                <td align="left">
                                    @if(!empty($product->tags))
                                        <?php $tags = explode(",",$product->tags);?>
                                        @if(count($tags) > 1)
                                            @foreach($tags as $tag)
                                                <li>{{ $tag }}</li>
                                            @endforeach
                                        @else
                                            {{ $product->tags }}
                                        @endif
                                    @else
                                        -
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <th width="100">Show ?</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ ($product->is_show ==0) ? 'Not Show' : 'Showed' }}</td>
                            </tr>
                            <tr>
                                <th width="100">Available ?</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{!!  \Expresskoreanmotor\Libraries\Customlib::gen_product_available($product->is_available) !!}</td>
                            </tr>
                            <tr>
                                <th width="100">Pict 1</th>
                                <td align="left" width="20">:</td>
                                <td align="left"><img src="{{ asset('uploaded/'.$product->pict_1) }}" height="150px" width="150px"> </td>
                            </tr>
                            <tr>
                                <th width="100">Pict 2</th>
                                <td align="left" width="20">:</td>
                                <td align="left">
                                    @if(!empty($product->pict_2))
                                        <img src="{{ asset('uploaded/'.$product->pict_2) }}" height="150px" width="150px">
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th width="100">Pict 3</th>
                                <td align="left" width="20">:</td>
                                <td align="left">
                                    @if(!empty($product->pict_3))
                                        <img src="{{ asset('uploaded/'.$product->pict_3) }}" height="150px" width="150px">
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th width="100">Last Updated</th>
                                <td align="left" width="20">:</td>
                                <td align="left">{{ $product->updated_at }}</td>
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