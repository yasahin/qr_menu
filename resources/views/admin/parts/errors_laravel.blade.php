@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning alert-icon" style="margin: 5px 0 5px 0;">
            <em class="icon ni ni-alert-circle"></em>
            {{ $error }}
        </div>
    @endforeach
@endif
