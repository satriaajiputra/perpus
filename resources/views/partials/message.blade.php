@if (Session::has('flash_message.status'))
    <div class="container">
        <div class="alert alert-{{ Session::get('flash_message.status') }}">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{ Session::get('flash_message.title') }}</strong><br>
            {!! Session::get('flash_message.pesan') !!}
        </div>
    </div>
@endif

@if(count($errors) > 0)
    <div class="container">
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Error!</strong><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
