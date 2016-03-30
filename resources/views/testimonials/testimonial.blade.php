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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>PT</th>
                                <th>Testimonial</th>
                                <th>Status</th>
                                <th>Update</th>
                                <th>Created At</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $no=0;?>
                            @foreach($order as $item)
                                <tr class="odd gradeX">
                                    <td>{{ $no+=1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->telepon }}</td>
                                    <td>{{ $item->perusahaan }}</td>
                                    <td>{{ $item->isi }}</td>
                                    <td>@if($item->status == 0) Belum Diverifikasi @else Sudah Diverifikasi @endif</td>
                                    <td>@if($item->status ==0)
                                         <a href="{{ route('testimonial.update',['id'=>$item->id,'status'=>1]) }}">Show ?</a>
                                        @else
                                          <a href="{{ route('testimonial.update',['id'=>$item->id,'status'=>0]) }}">Not Show ?</a>
                                        @endif
                                    <td>{{ $item->created_at }}</td>

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

        });
    </script>
@endsection