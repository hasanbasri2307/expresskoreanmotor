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

                            {!! Form::model($category, array('route' => array('category.update', $category->id),'method'=>'put')) !!}
                            <div class="form-group">
                                <label>Name</label>
                                {!! Form::text('cat_name',old('cat_name'),['class'=>'form-control','placeholder'=>'Name']) !!}

                            </div>

                            <div class="form-group">
                                <label>Show ?</label>
                                <label class="radio-inline">
                                    {!! Form::radio('is_show', 1, ($category->status ==1) ? true :'') !!} Show
                                </label>
                                <label class="radio-inline">
                                    {!! Form::radio('is_show',0,($category->status ==0) ? true :'') !!} Not Show
                                </label>

                            </div>

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