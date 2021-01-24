@if(session()->has('success'))
    <div class="alert alert-success text-center ">
        {{session()->get('success')}}
    </div>
@endif

@if(session()->has('fail') || session()->has('errors'))
    <div class="alert alert-danger text-center" role="alert">
        <strong>Notice! </strong>  {{(session()->get('fail')) ? session()->get('fail') : session()->get('errors')->first()}}
    </div>
@endif


