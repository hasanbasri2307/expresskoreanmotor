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

                            {!! Form::open(array('route'=>'product.store','method'=>'post','files'=>true)) !!}
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
                                    {!! Form::select('cat_id', $category, null, ['placeholder' => 'Select Category..','class'=>'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    {!! Form::text('tags',old('tags'),['class'=>'form-control','placeholder'=>'Tags (separator with comma)']) !!}

                                </div>

                                <div class="form-group">
                                    <label>Available ?</label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_available', 1); !!} Available
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_available',0); !!} Out Of Stock
                                    </label>

                                </div>

                                <div class="form-group">
                                    <label>Show ?</label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_show', 1); !!} Show
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('is_show',0); !!} Not Show
                                    </label>

                                </div>

                                <div class="form-group" id="pict_one">
                                    <label>Picture</label>
                                    {!! Form::file('picture[]',['multiple'=> true]) !!}
                                </div>


                                <button type="submit" class="btn btn-default">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                                <button type="button" class="btn btn-default" id="add_pict">Add Picture</button>
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
            var counts = 0;
            $('#add_pict').on('click',function(){
               if(counts >=  2){
                   alert("Maximize 3 picture !!");
               }else{
                   var _input = '<div class="form-group">{!! Form::file('picture[]',['multiple'=> true]) !!}</div>';
                   $(_input).insertAfter('#pict_one');
                   counts++;
               }

            });

        });
    </script>
@endsection