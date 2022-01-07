@if (session('error'))
    <div class="alert alert-warning alert-icon" style="margin: 5px 0 5px 0;">
        <em class="icon ni ni-alert-circle"></em>
        {{ session('error') }}
    </div>
@endif
