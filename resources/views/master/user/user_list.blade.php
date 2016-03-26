@extends("layouts.master")
@section("title",$title)
@section("custom_css")
    <link href="{{ asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $title }}
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if(Session::has('success'))
                        <div role="alert" class="alert alert-success alert-dismissible fade in">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Last Login</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0;?>
                            @foreach($user as $item)
                            <tr class="odd gradeX">
                                <td>{{ $no+=1 }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->u_name }}</td>
                                <td class="center">{!! \Expresskoreanmotor\Libraries\Customlib::gen_status_user($item->status) !!}</td>
                                <td class="center">{{ $item->updated_at }}</td>
                                <td><a href="{{ route('user.edit',[$item->id]) }}" class="fa fa-edit"> Edit</a> &nbsp <a href="{{ route('user.delete',array($item['id'])) }}" data-method="delete" rel="nofollow"  data-token="{{ csrf_token() }}" class="fa fa-trash-o" id="delete_user"> Delete</a> </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                    <a href="{{ route('user.add') }}"><button type="button" class="btn btn-primary">Add User</button></a>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection
@section("custom_js")
    <script src="{{ asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });

            $(document).on('click', 'a#delete_user', function(e) {
                e.preventDefault();

                var conf = confirm("Delete this data ?");
                if(conf){
                    var token = $(this).data('token');
                    var route = $(this).attr('href');

                    $.ajax({
                        url:route,
                        type: 'post',
                        data: {_method: 'delete', _token :token}
                    }).done(function(){
                        location.reload(true);
                    });
                }

            });
        });
    </script>
@endsection