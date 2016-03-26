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

                            {!! Form::open(array('route'=>'user.store','method'=>'post')) !!}
                                <div class="form-group">
                                    <label>Name</label>
                                    {!! Form::text('u_name',old('name'),['class'=>'form-control','placeholder'=>'Name']) !!}

                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    {!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}

                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <label class="radio-inline">
                                        {!! Form::radio('status', 1); !!} Active
                                    </label>
                                    <label class="radio-inline">
                                        {!! Form::radio('status',2); !!} Non active
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