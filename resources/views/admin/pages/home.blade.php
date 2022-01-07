@extends('admin.layouts.default')
@section('title') Ana Sayfa @endsection
@section('content')
    <div class="nk-content-body">
        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-md-12">
                    @include('admin.parts.account_verify_alert')
                    @include('admin.parts.home_welcome_alert')
                </div>
                @if(checkAuths("auth_users_stats"))
                    <div class="col-md-4">
                        @include('admin.stats.users_stats')
                    </div>
                @endif
            </div><!-- .row -->
        </div><!-- .nk-block -->
    </div>
@endsection
