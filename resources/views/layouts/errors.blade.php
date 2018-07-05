@if (count($errors) > 0)
  <div class="alert alert-danger alert-with-icon" data-notify="container">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <span data-notify="message">
      @foreach ($errors->all() as $error)
        <strong>{{ $error }}</strong><br>
      @endforeach
    </span>
  </div>
@endif