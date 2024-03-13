@if(!empty(session('success')))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(!empty(session('warning')))
    <div class="alert alert-warning" role="alert">
        {{ session('warning') }}
    </div>
@endif

@if(!empty(session('info')))
    <div class="alert alert-info" role="alert">
        {{ session('info') }}
    </div>
@endif

@if(!empty(session('status')))
    <div class="alert alert-info" role="alert">
        {{ session('status') }}
    </div>
@endif

@if(!empty(session('payment-error')))
    <div class="alert alert-success" role="alert">
        {{ session('payment-error') }}
    </div>
@endif

@if(!empty(session('payment-success')))
    <div class="alert alert-success" role="alert">
        {{ session('payment-success') }}
    </div>
@endif

@if(!empty(session('payment-warning')))
    <div class="alert alert-warning" role="alert">
        {{ session('payment-warning') }}
    </div>
@endif

@if(!empty(session('primary')))
    <div class="alert alert-info" role="alert">
        {{ session('primary') }}
    </div>
@endif

@if(!empty(session('secondary')))
    <div class="alert alert-info" role="alert">
        {{ session('secondary') }}
    </div>
@endif

@if(!empty(session('light')))
    <div class="alert alert-info" role="alert">
        {{ session('light') }}
    </div>
@endif
