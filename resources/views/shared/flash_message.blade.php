@if(session()->has('msg'))
    <div class="alert alert-{{session('type')}} alert-dismissible text-center">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>{!! session('msg') !!}</div>
@endif

