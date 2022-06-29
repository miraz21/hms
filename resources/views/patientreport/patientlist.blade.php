@extends('admin.home')
@section('content')
 <div class="container-fluid page-body-wrapper">
    <div class="container" align="center" style="padding-top:100px;">
    <div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<h3 class="text-center mt-3">Select Patient</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('patient.report') }}" method="get">
 
<div class="mb-3">
    <select name="id" id="name"  class="custom-select">
        <option style="text-align:center">--- Select Patient ---</option>

        @foreach ($p_lists as $p)
            <option value="{{ $p->id }}">{{ $p->appoint_name }}</option>
        @endforeach
     </select>
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</div>

   <script type="text/javascript">
    $(document).ready(function(){
      $('#name').select2({
        placeholder: "select patient",
        allowClear: true
      });
    });
    </script>

@endsection