@extends('layouts.master')
@section('title','List User')
@section("custom_css")
	<link href="{{ asset('assets/css/datatables/tools/css/dataTables.tableTools.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>
            List User
            <small>
                
            </small>
        </h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Users<small>all</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a href="#"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id="example" class="table table-striped responsive-utilities jambo_table">
            <thead>
              <tr class="headings">
                <th>No</th>
                <th>Name </th>
                <th>Email </th>
                <th>Status </th>
                <th>Last Login </th>
                <th class=" no-link last"><span class="nobr">Action</span>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php $no=0;?>
              @foreach($user as $item)
	              <tr class="even pointer">
	                <td>{{ $no+=1 }}</td>
	                <td class=" ">{{ $item->u_name }}</td>
	                <td class=" ">{{ $item->email }}</td>
	                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i>
	                </td>
	                <td class=" ">John Blank L</td>
	              
	                <td class=" last"><a href="#">View</a>
	                </td>
	              </tr>
	          @endforeach
              
            </tbody>

          </table>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">
	  	<div class="x_panel">
	        <div class="x_content">
	          <button class="btn btn-primary" type="button">Create User</button>
	        </div>
	      </div>
	  </div>
  </div>
</div>

@endsection
@section("custom_js")
	<script src="{{ asset('assets/js/datatables/js/jquery.dataTables.js') }}"></script>
  	<script src="{{ asset('assets/js/datatables/tools/js/dataTables.tableTools.js') }}"></script>
  	<script src="{{ asset('assets/js/pace/pace.min.js') }}"></script>
	<script>
		$(document).ready(function() {
		  $('input.tableflat').iCheck({
		    checkboxClass: 'icheckbox_flat-green',
		    radioClass: 'iradio_flat-green'
		  });
		});

		var asInitVals = new Array();
		$(document).ready(function() {
		  var oTable = $('#example').dataTable({
		    "oLanguage": {
		      "sSearch": "Search all columns:"
		    },
		    "aoColumnDefs": [{
		        'bSortable': false,
		        'aTargets': [0]
		      } //disables sorting for column one
		    ],
		    'iDisplayLength': 12,
		    "sPaginationType": "full_numbers",
		    "dom": 'T<"clear">lfrtip',
		    "tableTools": {
		      "sSwfPath": "{{ asset('assets/js/datatables/tools/swf/copy_csv_xls_pdf.swf') }}"
		    }
		  });
		  $("tfoot input").keyup(function() {
		    /* Filter on the column based on the index of this element's parent <th> */
		    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
		  });
		  $("tfoot input").each(function(i) {
		    asInitVals[i] = this.value;
		  });
		  $("tfoot input").focus(function() {
		    if (this.className == "search_init") {
		      this.className = "";
		      this.value = "";
		    }
		  });
		  $("tfoot input").blur(function(i) {
		    if (this.value == "") {
		      this.className = "search_init";
		      this.value = asInitVals[$("tfoot input").index(this)];
		    }
		  });
		});
	</script>
@endsection