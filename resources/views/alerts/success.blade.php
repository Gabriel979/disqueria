includas las alertas
@if(Session::has('message'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	  <strong>Bien!</strong> {{ Session::get('message') }}
	</div>

@endif	