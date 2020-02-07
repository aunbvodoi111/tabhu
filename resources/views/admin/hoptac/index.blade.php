@extends('admin.index')
@section('content')
    <link rel="stylesheet" href="admin/assets/css/normalize.css">
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="admin/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="admin/assets/scss/style.css">
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>
                <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Nội dung</th>
                            <th>Số điện thoại</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hoptac as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->content}}</td>
                                <td>{{$item->phone}}</td>
                                {{-- <td>
                                    <a href="quantri/cate/edit/{{ $item->id }}" title="Sửa"><i class="fa fa-edit"></i></a>
                                    <a href="quantri/cate/delete/{{ $item->id }}" title="Xóa"><i class="fa fa-trash-o"></i></a>
                                </td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

</div><!-- /#right-panel -->

<!-- Right Panel -->




<script src="admin/assets/js/lib/data-table/datatables.min.js"></script>
<script src="admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="admin/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="admin/assets/js/lib/data-table/jszip.min.js"></script>
<script src="admin/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="admin/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="admin/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="admin/assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  $('#bootstrap-data-table-export').DataTable();
} );
</script>


@endsection