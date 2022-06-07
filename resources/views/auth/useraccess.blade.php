 
@extends('layouts.mainlayout')
    
@section('content')

<title>Laravel - User Control</title>
<style>
    #example1 thead tr th:nth-child(1)::before {
        display: none!important;
    }

    #example1 thead tr th:nth-child(1)::after {
        display: none!important;
    }
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
        <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">User Control</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Control</a></li>
                                <li class="breadcrumb-item active">User Control</li>
                            </ol>
                        </div>

                    </div>
                    @include('alerts/flash-message')
                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                            <form action="{{ route('set-user-access') }}" method="post">     
                                @csrf
                                <h4>User Access</h4>


                                <div class="page-header px-3"><div class="row r-white w-100">
                                            
                                    <div class="col-md-2">
                                            <label class="mb-0 font-weight-normal small" for="roleID">Role</label>
                                        <div class="input-group-sm form-group">
                                            <select class="form-control required regcodesel select2bs4" id="roleID" name="roleID" required="true">
                                                <option value="none" selected="" disabled hidden>Select</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->roles }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    @error('roleID')
                                    <div class="col-md-3">
                                        <br><label style="color:red">
                                        {{ $message }} 
                                        </label>
                                    </div>
                                    @enderror
                                <div class="col-4"><div class="hpanel mb-2">                                   
                                    <div class="row g-3" style="background: whitesmoke;">
                                    <h6>Orders</h6>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="Orders/add" name="Orders/add" value="Orders/add">
                                                    <label for="Orders/add" class="custom-control-label">Add</label>
                                        </div>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="Orders/view" name="Orders/view" value="Orders/view">
                                                    <label for="Orders/view" class="custom-control-label">View</label>
                                        </div>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="Orders/details" name="Orders/details" value="Orders/details">
                                                    <label for="Orders/details" class="custom-control-label">Details</label>
                                        </div>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="Orders-edit" name="Orders-edit" value="Orders-edit">
                                                    <label for="Orders-edit" class="custom-control-label">Edit</label>
                                        </div>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="Orders/delete-orders" name="Orders/delete-orders" value="Orders/delete-orders">
                                                    <label for="Orders/delete-orders" class="custom-control-label">Delete</label>
                                        </div>
                                    </div>
                                </div></div>
                


                                <br><div class="col-md-6">                                 
                                    <div class="row g-3" style="background: whitesmoke;">
                                    <h6>Others</h6>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="dashboard" name="dashboard" value="dashboard">
                                                    <label for="dashboard" class="custom-control-label">Dashboard</label>
                                        </div>
                                        <div class="col-sm-3">
                                                    <input class="custom-control-input access" type="checkbox" id="logs-report" name="logs-report" value="logs-report">
                                                    <label for="logs-report" class="custom-control-label">Logs</label>
                                        </div>
                                    </div>                                  
                                </div></div>

                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div> 

                                </div></div>

                            </form>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div id="customerList">
                        <table id="users-table" class="table table-hover table-s">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User Access</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr> 
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->roles }}</td>
                                        <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="{{ "Master".$role->id }}"
                                                    @php
                                                    if($role->active == "Yes") echo "checked";   
                                                    @endphp
            
                                                    value="{{ $role->id }}"
                                                    onclick="Master({{ $role->id }},'{{$role->active}}',event)"
                                                />
                                                <label class="custom-control-label" for="{{ "Master".$role->id }}"></label>
                                            </div>
                                        </td>
                                    </tr>   
                                @endforeach
                                    
                            </tbody>
                        </table>
                </div></div></div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery/jquery.min.js')}}"></script>
<script>
    
    $(document).ready(function () {
          
        $("#users-table").DataTable({
              responsive: true,
              autoWidth: false,
              columnDefs: [ {
              targets: [2], 
              orderable: false,  
            }]
        });
    });
      
    </script>
    @endsection
    
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
     <script type="text/javascript">
        $(document).ready(function(){  
      $("#access_control").addClass("menu-open");
    
    });
     </script>
    <script>
    
    
       $(document).ready(function () {
           
            $('#roleID').change(function(e){
            
                var roleID = $(this).val();
                //alert(roleID);
                // $(':input[type=checkbox]').prop('checked',false);
                $('.access').prop('checked',false);
    
                e.preventDefault();
                    $.ajaxSetup({
                    headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                });
          
                $.ajax({
                    type:'POST',
                    url:'{{ route("get-user-access") }}',
                    data: {
                        'Id': roleID,
                        '_token': "{{ csrf_token() }}",
                    },
                   
                    success:function(response) { 
                    const obj = JSON.parse(response);
                      
                    if(response == 404) return console.log('sorry no data found');
                   
                      for(let permission in obj.permissions){
                          
                          document.getElementById(permission).checked = true;
                      }
                       
                        
    
                     }
                });
            
            });
    
       });
     
    </script>
    
    <script>
    
     function Master(roleID,status,event) { 
    
        let active = "";
    
        status == "Yes" ? active = "No" : active = "Yes";
    
        event.preventDefault();
            $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        });
    
        $.ajax({
            
            type:'POST',
            
            url:'{{ route("update-role-status") }}',
            
            data: { 'Id': roleID,'status' : active, '_token': "{{ csrf_token() }}", },
    
            dataType: 'JSON',
                
                success:function(response) { 
                        
                    if(response == 1) {
    
                       let status = document.getElementById('Master'+roleID).checked;
                         
                       if(status) $('#Master'+roleID).prop('checked',false);
                       else  $('#Master'+roleID).prop('checked',true);
                        
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.success("Role status updated successfully!");
                    }
    
                    else {
                        toastr.options.closeButton = true;
                        toastr.options.closeMethod = 'fadeOut';
                        toastr.options.closeDuration = 100;
                        toastr.error("Role status not updated");
                    }
    
                     }
                });
        
      }
    
    
    
    </script>