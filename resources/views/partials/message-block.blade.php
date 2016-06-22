    @if(count($errors) > 0)
    <div class="row">
        <div class="alert alert-danger col-md-4 col-md-offset-4">
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
    </div>
    @endif
@if (Session::has('flash_notification.message'))
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
			@include('flash::message')
        </div>
    </div>
@endif