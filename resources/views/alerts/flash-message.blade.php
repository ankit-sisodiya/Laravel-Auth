@if ($message = Session::get('success'))
<div class="alert alert-success" role="alert">
    <strong> {{ $message }} </strong>!
</div>
@endif
  
@if ($message = Session::get('error'))
<div class="alert alert-danger mb-xl-0" role="alert">
    <strong> {{ $message }} </strong> !
</div>
@endif
   
@if ($message = Session::get('warning'))
<div class="alert alert-warning" role="alert">
    <strong> {{ $message }} </strong> !
</div>
@endif
   
@if ($message = Session::get('info'))
<div class="alert alert-info" role="alert">
    <strong>{{ $message }} !</strong>
</div>
@endif
  
@if ($errors->any())
<div class="alert alert-light" role="alert">
    <strong>Please check the form below for errors!</strong>
</div>
@endif