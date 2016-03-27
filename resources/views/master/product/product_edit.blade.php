@extends("layouts.master")
@section("title",$title)
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $title }}
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            @if (count($errors) > 0)
                                <div role="alert" class="alert alert-danger alert-dismissible fade in">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </div>
                            @endif

                            {!! Form::model($product, array('route' => array('product.update', $product->id),'method'=>'put','files'=>true,'id'=>'product-update')) !!}
                                <div class="form-group">
                                    <label>Name</label>
                                    {!! Form::text('p_name',old('p_name'),['class'=>'form-control','placeholder'=>'Name']) !!}

                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>'Price']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    {!! Form::text('discount',old('discount'),['class'=>'form-control','placeholder'=>'Discount']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    {!! Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'Description']) !!}

                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    {!! Form::select('cat_id', $category, old('cat_id'), ['placeholder' => 'Select Category..','class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    {!! Form::text('tags',old('tags'),['class'=>'form-control','placeholder'=>'Tags (separator with comma)']) !!}

                                </div>

                                <div class="form-group">
                                    <label>Available ?</label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_available', 1 ,($product->is_available==1) ? true:''); !!} Available
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_available',0,($product->is_available==0) ? true:''); !!} Out Of Stock
                                    </label>

                                </div>

                                <div class="form-group">
                                    <label>Show ?</label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_show', 1,($product->is_show==1) ? true:''); !!} Show
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_show',0,($product->is_show==0) ? true:''); !!} Not Show
                                    </label>

                                </div>



                                <div class="form-group" id="res_pict_one">
                                    <label>Picture 1</label>
                                    <img src="{{ asset('uploaded/'.$product->pict_1) }}" width="150px" height="150px">

                                    <a id="change_pict_1" style="cursor: pointer">Change Picture</a>


                                </div>

                                <div class="form-group" id="pict_one" style="display: none;">
                                    <label>Picture 1 </label>
                                    {!! Form::file('picture_1',['multiple'=> true,'disabled'=>true,'id'=>'p1']) !!}
                                    {!! Form::hidden('pic1',$product->pict_1) !!}
                                    {!! Form::hidden('change_1','0') !!}
                                </div>

                                @if(!empty($product->pict_2))
                                    <div class="form-group" id="res_pict_two">
                                        <label>Picture 2</label>
                                        <img src="{{ asset('uploaded/'.$product->pict_2) }}" width="150px" height="150px">

                                        <a id="change_pict_2" style="cursor: pointer">Change Picture</a>
                                    </div>
                                @else
                                    <div class="form-group" >
                                        <label>Picture 2</label>
                                        {!! Form::file('picture_2',['multiple'=> true]) !!}

                                    </div>
                                @endif

                                <div class="form-group" id="pict_two" style="display: none;">
                                    <label>Picture 2</label>
                                    {!! Form::file('picture_2',['multiple'=> true,'disabled'=>true,'id'=>'p2']) !!}
                                    {!! Form::hidden('pic2',$product->pict_2) !!}
                                    {!! Form::hidden('change_2','0') !!}
                                </div>

                                @if(!empty($product->pict_3))
                                    <div class="form-group" id="res_pict_three">
                                        <label>Picture 3</label>
                                        <img src="{{ asset('uploaded/'.$product->pict_3) }}" width="150px" height="150px">

                                        <a id="change_pict_3" style="cursor: pointer">Change Picture</a>
                                    </div>
                                @else
                                    <div class="form-group" >
                                        <label>Picture 3</label>
                                        {!! Form::file('picture_3',['multiple'=> true]) !!}

                                    </div>
                                @endif


                                <div class="form-group" id="pict_three" style="display:none" >
                                    <label>Picture 3</label>
                                    {!! Form::file('picture_3',['multiple'=> true,'disabled'=>true,'id'=>'p3']) !!}
                                    {!! Form::hidden('pic3',$product->pict_3) !!}
                                    {!! Form::hidden('change_3','0') !!}
                                </div>

                                <div id="additional_pict"></div>

                                <button type="submit" class="btn btn-default">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>

                            {!! Form::close() !!}
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection
@section("custom_js")
    <script>
        $(document).ready(function() {


            $('#change_pict_1').on('click',function(){
                $(this).hide();
                $('#res_pict_one').hide();
                $('#pict_one').show();
                $('input[name=change_1]').val('1');
                $('#p1').removeAttr('disabled');

            });

            $('#change_pict_2').on('click',function(){
                $(this).hide();
                $('#res_pict_two').hide();
                $('#pict_two').show();
                $('input[name=change_2]').val('1');
                $('#p2').removeAttr('disabled');

            });

            $('#change_pict_3').on('click',function(){
                $(this).hide();
                $('#res_pict_three').hide();
                $('#pict_three').show();
                $('input[name=change_3]').val('1');
                $('#p3').removeAttr('disabled');


            });

        });
    </script>
@endsection