@extends('layouts.mainlayout')

@section('content')

<!-- Content Wrapper. Contains page content -->

<title>PHPPOESTS - USERS  - ADD</title>

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Users</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                          <li class="breadcrumb-item active">Users</li>
                      </ol>
                  </div>

              </div>
              <div class="card"> 
                <div class="card-body">
                    <div id="customerList">
                    @include('alerts/flash-message')
                    @if($user)
                        <form class="needs-validation" method="POST" action="{{ route('Users/update',$user) }}" novalidate>
                            @method('put')
                    @else
                        <form method="POST" class="needs-validation" action="{{ route('Users/create') }}" id="regForm" novalidate>
                    @endif
                <!--  <form method="POST" class="needs-validation" action="{{ route('Users/create') }}" id="regForm" novalidate> -->
                    @csrf    
                    <div class="row g-3">
                        <div class="col-sm-3">
                        <select class="form-control select2bs4" name="role_id" required="" id="role_id">
                            <option value="none" selected="" disabled hidden>Select Roles</option>
                            @foreach($roles as $data)
                                 <option value="{{ $data->id }}" <?php if($data->id == @$user->role_id){echo "selected";}?>>{{ $data->roles }}</option>
                            @endforeach
                        
                        </select>
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" name="first_name" value="{{ @$user->first_name }}" class="form-control" placeholder="Firstname" aria-label="First-Name">
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" name="last_name" value="{{ @$user->last_name }}" class="form-control" placeholder="Lastname" aria-label="Last-Name">
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" name="designation" value="{{ @$user->designation }}" class="form-control" placeholder="Designtion" aria-label="Email Id">
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <select class="form-control select2bs4" name="department" id="department">
                                    <option value="none" selected="" disabled hidden>Select Department</option>
                                    @foreach($departments as $data)
                                    <option value="{{ $data->id }}" <?php if($data->id == @$user->department){echo "selected";}?>>{{ $data->department_name }}</option>
                                    @endforeach
                            </select>
                        </div><!--end col-->                        
                        <div class="col-sm-3">
                            <input type="email"  name="email" value="{{ @$user->email }}" class="form-control" placeholder="E-Mail" aria-label="E-Mail">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" name="contact_no" value="{{ @$user->contact_no }}" class="form-control" placeholder="Phone No." aria-label="Phone No.">
                        </div><!--end col-->  
                        <div class="col-sm-3">
                        <select class="form-control select2bs4" name="active" required="" id="active">
                            <option value="none" selected="" disabled hidden>Select Status</option>                           
                            <option value="Yes" <?php if(@$user->active == "Yes"){echo "selected";}?>>Active</option>
                            <option value="No" <?php if(@$user->active == "No"){echo "selected";}?>>Inactive</option>
                            
                        
                        </select>
                        </div><!--end col-->                     
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>                                         
                </div><!--end row-->
                
                </form>
                </div></div></div>


              <div class="card">              

                <div class="card-body">
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                            <div class="col-sm-auto">
                                <div>
                                    <!-- <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button> -->
                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <div class="search-box ms-2">
                                        <input type="text" class="form-control search" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive table-card mt-3 mb-1">
                            <table class="table align-middle table-nowrap" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" style="width: 50px;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                            </div>
                                        </th>
                                        <th class="sort" data-sort="user_access">User Access</th>
                                        <th class="sort" data-sort="name">Name</th>
                                        <th class="sort" data-sort="designation">Designation</th>
                                        <th class="sort" data-sort="department">Department</th>
                                        <th class="sort" data-sort="email">Email</th>                                      
                                        <th class="sort" data-sort="phone">Contact No</th>
                                        <th class="sort" data-sort="status">Status</th>
                                        <th class="sort" data-sort="action">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                <?php $i=1; ?>
                                @foreach($users as $data)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                            </div>
                                        </th>
                                        <td class="user_access">{{ $data->roles }}</a></td>
                                        <td class="name">{{ $data->first_name }} {{ $data->last_name }}</td>
                                        <td class="designation">{{ $data->designation }}</td>
                                        <td class="department1">{{ $data->department_name }}</td>
                                        <td class="email">{{ $data->email }}</td>
                                        <td class="phone">{{ $data->contact_no }}</td>
                                        @if($data->active == 'Yes')
                                        <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                        @else
                                        <td class="status"><span class="badge badge-soft-danger text-uppercase">Inactive</span></td>
                                        @endif
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <!-- <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button> -->
                                                    <a href="{{ route('Users/edit',$data->id) }}" class="btn btn-sm btn-success edit-item-btn"> Edit</a>
                                                </div>
                                                <div class="remove">
                                                <a data-attr="{{ $data->id }}" class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal" id="delete-model">Remove</a>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                    <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card -->
            </div>
          </div>
      </div>
    </div>
  </div>
</div>    

 <!-- Modal -->
 <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
              </div>
              <div class="modal-body">
                  <div class="mt-2 text-center">
                      <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                      <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                          <h4>Are you Sure ?</h4>
                          <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                      </div>
                  </div>
                  <form method="POST" class="needs-validation" action="{{ route('Users/delete') }}" novalidate>
                    @csrf
                    <input type="hidden" id="id" value="" name="id">
                  <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                      <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                  </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <!--end modal -->

@endsection
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script type="text/javascript">
// $(document).ready(function(){  
//     $("input").on("keypress", function(e) {
//         if (e.which === 32 && !this.value.length)
//             e.preventDefault();
//     });
// });
//   $(document).ready(function(){  
//   $("#users").addClass("menu-open");
//   //$(".select2bs4").select2();
//   $("#regForm").validate({
//           ignore: '',
          
//         });

// });

// let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

// elems.forEach(function(html) {
//     let switchery = new Switchery(html,  { size: 'small' });
// });
// $(document).ready(function(){
//     $('.status').change(function () {
//         let status = $(this).prop('checked') === true ? 'Yes' : 'No';
//         let userId = $(this).data('id');
//         //alert(userId);
//         $.ajax({
//             type: "GET",
//             dataType: "json",
//             url: '{{ route('Users/status') }}',
//             data: {'status': status, 'user_id': userId},
//             success: function (data) {
//                 toastr.options.closeButton = true;
//                 toastr.options.closeMethod = 'fadeOut';
//                 toastr.options.closeDuration = 100;
//                 toastr.success(data.message);
//             }
//         });
//     });
// });
$(document).ready( function () {
$(document).on('click', '#delete-model', function(event) {
      let id = $(this).attr('data-attr');
      alert(id );
      $('#deleteRecordModal').modal("show");
      $('#id').val(id);
  });
});


</script>