<!-- Bootstrap core JavaScript-->
<script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">

    function showStoredNotifications() {
        var storedNotifications = sessionStorage.getItem('pusherNotifications');
        var notificationsArray = [];

        if (storedNotifications) {
            notificationsArray = JSON.parse(storedNotifications);

            for (var i = 0; i < notificationsArray.length; i++) {
                var notification = notificationsArray[i];
                // Tampilkan notifikasi ke pengguna sesuai dengan kebutuhan Anda
                // Misalnya, Anda dapat menggunakan toastr atau elemen HTML untuk menampilkannya.
                // Di sini, Anda dapat menyesuaikan cara menampilkan notifikasi.
            }
        }
    }

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
    "positionClass": "toast-top-right",
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

        // Menyimpan notifikasi ke dalam sessionStorage
        var storedNotifications = sessionStorage.getItem('pusherNotifications');
        var newNotification = {
            no_pesanan: data.no_pesanan,
            nama_pelanggan: data.nama_pelanggan
        };
        var notificationsArray = [];

        if (storedNotifications) {
            notificationsArray = JSON.parse(storedNotifications);
        }

        notificationsArray.unshift(newNotification);
        sessionStorage.setItem('pusherNotifications', JSON.stringify(notificationsArray));
        toastr.success('Terdapat pesanan baru!');
        console.log(toastr.success('Terdapat pesanan baru!'));

        var audio = new Audio('/sound/notif.wav');
        audio.play();
        audio.play();
    });
</script>