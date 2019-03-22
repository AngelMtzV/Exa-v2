<div id="mensaje" class="container">
  @if(Session::has('message'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('message') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
</div>
<div id="mensaje" class="container">
  @if(Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('error') }}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  @endif
</div>