@extends('layouts.mainlayout')

@section('content')

<!-- Content Wrapper. Contains page content -->

<title>PHPPOESTS - Orders  - Edit</title>

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0">Orders</h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                          <li class="breadcrumb-item active">Orders</li>
                      </ol>
                  </div>

              </div>
              <div class="card"> 
                <div class="card-body">
                    <div id="customerList">
                    @include('alerts/flash-message')
                   
                    <form>                   
                      
                    <div class="row g-3">                        
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Firstname" aria-label="First-Name">
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Lastname" aria-label="Last-Name">
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Designtion" aria-label="Email Id">
                        </div><!--end col-->                                              
                        <div class="col-sm-3">
                            <input type="email"   class="form-control" placeholder="E-Mail" aria-label="E-Mail">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div><!--end col-->
                        <div class="col-sm-3">
                            <input type="text" class="form-control" placeholder="Phone No." aria-label="Phone No.">
                        </div><!--end col-->  
                        <div class="col-sm-3">
                        <select class="form-control select2bs4" name="active" required="" id="active">
                            <option value="none" selected="" disabled hidden>Select Status</option>                           
                            <option value="Yes" >Active</option>
                            <option value="No" >Inactive</option>
                            
                        
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
              
            </div>
          </div>
      </div>
    </div>
  </div>
</div> 
@endsection
