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
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0;?>
                            @foreach($order as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $no+=1 }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{!! \Expresskoreanmotor\Libraries\Customlib::gen_status_order($item->status) !!}</td>
                                    <td><a href="{{ route('order.show',[$item->id]) }}" class="fa fa-search">Detail</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->

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