<ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.users.list.view",$User->id) }}"><em class="icon ni ni-user-circle"></em><span>Kişisel Bilgiler</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.users.list.view.activity",$User->id) }}"><em class="icon ni ni-activity"></em><span>Hareketler</span></a>
    </li>
    <li class="nav-item nav-item-trigger d-xxl-none">
        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
    </li>
</ul><!-- .nav-tabs -->
