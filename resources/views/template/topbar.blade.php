<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" id="searchDropdown" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>
            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input class="form-control bg-light border-0 small" type="text" aria-label="Search"
                            aria-describedby="basic-addon2" placeholder="Search for...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" id="alertsDropdown" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span data-count="0" class="badge badge-danger badge-counter"></span>
            </a>
            <!-- Dropdown - Alerts -->
            <ul class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                        <!-- Your notification items go here -->
                        <!-- Example:-->
                        
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </ul>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->nama }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('template/img/undraw_profile.svg') }}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profil.index') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal" href="#">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- Bootstrap 3.3.7 JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    var notificationsWrapper = $('.dropdown');
    var notificationsToggle = notificationsWrapper.find('a.dropdown-toggle');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.attr('data-count')); // Menggunakan .attr() untuk mendapatkan nilai data-count
    var notifications = notificationsWrapper.find('ul.dropdown-menu');

    if (notificationsCount <= 0) {
        notificationsCountElem.hide();
    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4c2f6f726b5d6216da11', {
        encrypted: true,
        cluster: 'ap1'
    });

    toastr.options = {
    "positionClass": "toast-bottom-right",
    "closeButton": true
    };

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('my-channel');

    // Bind a function to an Event (the full Laravel class)
    channel.bind('my-event', function (data) {
        var existingNotifications = notifications.html();
        var newNotificationHtml = `
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">No.Pesanan:`+ data.no_pesanan +`</div>
                <span class="font-weight-bold">`+ data.nama_pelanggan +`</span>
            </div>
        </a>
        `;
        notifications.html(newNotificationHtml + existingNotifications);

        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount); // Memperbarui nilai data-count
        notificationsCountElem.text(notificationsCount); // Memperbarui teks dalam tombol dropdown
        notificationsWrapper.find('.navbar-toggle .notification-icon').addClass('active');
        notificationsWrapper.find('.divider').removeClass('hidden');
        notificationsWrapper.show();
        toastr.success('Terdapat pesanan baru!');

        var audio = new Audio('/sound/notif.wav');
        audio.play();
    });
</script>
