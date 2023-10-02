<!-- Page level plugins -->
<script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('template/js/demo/datatables-demo2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    const totalInput = document.getElementById('total');
    const diskonInput = document.getElementById('diskon');
    const totalAkhirInput = document.getElementById('total-akhir');

    // Fungsi untuk menghitung total akhir
    function updateTotal() {
            const harga = parseFloat(totalInput.value) || 0;
            const diskon = parseFloat(diskonInput.value) || 0;
            const totalAkhir = harga - diskon;

            totalAkhirInput.value = totalAkhir;
        }
    
    // Tambahkan event listener untuk input diskon
    diskonInput.addEventListener('input', updateTotal);

    // Panggil fungsi pertama kali untuk menginisialisasi nilai total akhir
    updateTotal();
</script>