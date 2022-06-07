@extends('layouts.mainlayout')

@section('content')
<style>
 .dataTables_wrapper .dataTables_filter {  
    margin-right: 10px;
}
</style>
<!-- Content Wrapper. Contains page content -->

<title>PHPPOESTS - Logs</title>

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Logs</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Logs</a></li>
                          <li class="breadcrumb-item active">Logs</li>
                      </ol>
                  </div>

              </div>
              <div class="card">               
              <form action="{{ route('logs-export') }}" method="POST">
                    @csrf            
                <div class="page-header px-3">
                            
                        
                  
                <!-- <button type="button" class="btn btn-success bg-gradient waves-effect waves-light">Success</button> -->
                    <button class="btn btn-success bg-gradient waves-effect waves-light filterbtnExp" type="submit" title="Export to Excel">
                       Export to excel  
                       
                    </button>
                </div>
                </form>
                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <!-- <div>
                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                </div> -->
                            </div>
                            <!-- <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="table-responsive">
                            <table id="logsTable" style="" class="table table-hover table-s dataTables">
                                <thead>
                                    <tr class="row_color" style="background: whitesmoke;">
                                        <th class="sort" style="width:10%!important;">#</th>
                                        <th class="sort" style="width:20%!important;">User</th>
                                        <th class="sort" style="width:20%!important;">Access Date & Time</th>
                                        <th class="sort" style="width:50%!important;">Access Description</th>
                                    </tr>
                                </thead>
                            <tbody>
                               
                            </tbody>
                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>


                            </tfoot>
                            </table>
                        </div>

                        <!-- <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div><!-- end card -->
            </div>
          </div>
      </div>
    </div>
  </div>
</div>     


@endsection
<script src="{{ asset('assets/js/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"></script>
<!--<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->



<script>

let dataTable = "";

//please code remove Comment for Custom Filter

// $('.applyFilter').click(function (event) { 
//     event.preventDefault();
//     dataTable.ajax.reload()
// });

// $('.resetFilter').click(function (event) { 

//     $('#userID').val('none').trigger('change');
//     $('#from').val(null);
//     $('#to').val(null);
//     event.preventDefault();
//     dataTable.ajax.reload()
// });

  
$(document).ready( function () {

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        dataTable =  $('#logsTable').DataTable({

            dom: 'lBfrtip',
            buttons: [
                'print','excel'
            ],
            bprocessing: true,
            bserverSide: true,
            lengthMenu: [[50, 75, 100, -1], [50, 75, 100, "All"]],
            //order: [],
            //serverMethod: 'get',

            //please code remove Comment for datatables filters

            // initComplete: function () {
            //     this.api()
            //         .columns()
            //         .every(function () {
            //             var column = this;
            //             var select = $('<select><option value=""></option></select>')
            //                 .appendTo($(column.footer()).empty())
            //                 .on('change', function () {
            //                     var val = $.fn.dataTable.util.escapeRegex($(this).val());
    
            //                     column.search(val ? '^' + val + '$' : '', true, false).draw();
            //                 });
    
            //             column
            //                 .data()
            //                 .unique()
            //                 .sort()
            //                 .each(function (d, j) {
            //                     select.append('<option value="' + d + '">' + d + '</option>');
            //                 });
            //         });
            // },
            
            ajax: {
            url: "{{ route('get-logs') }}",
            dataSrc: "logs",
            data : function(data){

                //please code remove Comment for Custom Filter Data
                // let userID = $('#userID').val();
                // let from  = $('#from').val();
                // let to = $('#to').val();

                // data.userID = userID;
                // data.from = from;
                // data.to = to;
                 
            },
            headers: "Content-Type: application/json",
            dataType: "JSON",
            method: "get",
            // success: function (data) { 
            //     console.clear();
            //     console.log(data);
            //  }
           },
           columns: [
                { data: 'num'   },
                { data: 'user'  },
                { data: 'dateAndTime' },
                { data: 'accessAndDescription' }
            ],
            stateSave: true,
        });
 
    });

setTimeout(function() { 
    $('.table-responsive').css('overflow', 'hidden');
 },500)

 </script>