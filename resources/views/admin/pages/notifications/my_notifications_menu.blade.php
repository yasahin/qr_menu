<ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.my_notifications.list.unread") }}"> <span class="badge badge-primary">{{ count(getAllMyUnreadNotifications()) }}</span> &nbsp; <span>Okunmamış</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.my_notifications.list.read") }}"> <span class="badge badge-primary">{{ count(getAllMyReadNotifications()) }}</span> &nbsp; <span>Okunmuş</span></a>
    </li>
    <li class="nav-item nav-item-trigger d-xxl-none">
        <a href="#" class="toggle btn btn-icon btn-trigger" data-target="userAside"><em class="icon ni ni-user-list-fill"></em></a>
    </li>
</ul><!-- .nav-tabs -->
