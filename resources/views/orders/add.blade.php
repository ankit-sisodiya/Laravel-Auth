@extends('layouts.mainlayout')

@section('content')

<!-- Content Wrapper. Contains page content -->

<title>PHPPOESTS - Orders  - ADD</title>

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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Sr. No.</th>
                                    <th class="text-center">Item Name</th>
                                    <th class="text-center">Qauntity</th>
                                    <th class="text-center">Rate</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove Row</th>
                                </tr>
                                </thead>
                                <tbody id="tbody">
                        
                                </tbody>
                            </table>
                            <button class="btn btn-md btn-primary" 
                                id="addBtn" type="button">Add new Row
                            </button>
                        </div>  


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
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script>
  $(document).ready(function () {
  
  // Denotes total number of rows
  var rowIdx = 0;

  // jQuery button click event to add a row
  $('#addBtn').on('click', function () {

    // Adding a row inside the tbody.
    $('#tbody').append(`<tr id="R${++rowIdx}">
         <td class="row-index text-center">
         <p>${rowIdx}</p>
         </td>
         <td class="row-index text-center">
         <p><input type="text" id="item_name${rowIdx}" class="form-control" placeholder="Item Name" aria-label="Item Name"></p>
         </td>
         <td class="row-index text-center">
         <p><input type="text" class="form-control" placeholder="Quantity" id="quantity${rowIdx}" aria-label="Email Id"></p>
         </td>
         <td class="row-index text-center">
         <p><input type="text" class="form-control" placeholder="Rate" id="rate${rowIdx}" aria-label="Rate"></p>
         </td>
         <td class="row-index text-center">
         <p><input type="text" class="form-control" id="total${rowIdx}" placeholder="Total" aria-label="Email Id"></p>
         </td>
          <td class="text-center">
            <button class="btn btn-danger remove"
              type="button">Remove</button>
            </td>
          </tr>`);

          
  });

  $(":input").on("keyup change", function(e) {
    alert('Vijay');
})

  // jQuery button click event to remove a row.
  $('#tbody').on('click', '.remove', function () {

    // Getting all the rows next to the row
    // containing the clicked button
    var child = $(this).closest('tr').nextAll();

    // Iterating across all the rows 
    // obtained to change the index
    child.each(function () {

      // Getting <tr> id.
      var id = $(this).attr('id');

      // Getting the <p> inside the .row-index class.
      var idx = $(this).children('.row-index').children('p');

      // Gets the row number from <tr> id.
      var dig = parseInt(id.substring(1));

      // Modifying row index.
      idx.html(`Row ${dig - 1}`);

      // Modifying row id.
      $(this).attr('id', `R${dig - 1}`);
    });

    // Removing the current row.
    $(this).closest('tr').remove();

    // Decreasing total number of rows by 1.
    rowIdx--;
  });
});

</script>
