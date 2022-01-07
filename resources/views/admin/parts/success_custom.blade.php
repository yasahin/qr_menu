@if (session('success'))
    <div class="alert alert-success alert-icon" style="margin: 5px 0 5px 0;">
        <em class="icon ni ni-check-circle-fill"></em>
        {{ session('success') }}
    </div>
@endif
