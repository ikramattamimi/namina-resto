$(document).ready(function () {
    $("#dataTable").DataTable();

    var table = $("#updatedTable").DataTable({
        stateSave: true,
        processing: false,
        serverSide: false,
        ajax: "/order/source",
        columns: [
            { data: null, orderable: false, searchable: false }, // No.
            { data: "kode", name: "kode" }, // No. Order
            { data: "nama", name: "nama" }, // Nama
            { data: "no_hp", name: "no_hp" }, // Whatsapp
            {
                data: "created_at",
                name: "created_at",
                render: function (data, type, full, meta) {
                    return (
                        '<div class="text-center">Meja No.' +
                        full.no_meja +
                        '</div><div class="text-center small">' +
                        moment(data).format("D MMM YYYY H:mm:ss") +
                        "</div>"
                    );
                },
            }, // Orderan
            {
                data: "nama_status",
                name: "nama_status",
                render: function (data, type, full, meta) {
                    var statusClass =
                        data === "Pending"
                            ? "text-warning"
                            : data === "Proses"
                            ? "text-primary"
                            : "";
                    return (
                        '<div class="text-center font-weight-bold ' +
                        statusClass +
                        '">' +
                        data +
                        "</div>"
                    );
                },
            }, // Status
            { data: null, defaultContent: "-", name: "nama_status" }, // Status Dapur
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (data) {
                    var buttonsHtml = `
            <div class="text-center d-flex justify-content-center">
              <button type="button" class="btn btn-warning mr-1 btn-edit-status" title="Edit Status" data-toggle="modal" data-target="#ubahStatus" data-kode="${data.kode}"><i class="fas fa-pencil-alt fa-xs"></i></button>
              <a href="/order/pendingDanProses/edit/${data.kode}" class="btn btn-primary mr-1" title="Edit Data"><i class="fas fa-edit fa-xs"></i></a>
              <a href="/order/cetak_nota/${data.kode}" class="btn btn-success mr-1" title="Cetak Nota Dapur"><i class="fas fa-print fa-xs"></i></a>
            </div>
          `;
                    return buttonsHtml;
                },
            }, // Aksi
        ],
        rowCallback: function (row, data, index) {
            // Nomor urut
            $("td:eq(0)", row).html(index + 1);
        },
    });

    $("#updatedTable").on("click", ".btn-edit-status", function () {
        var kode = $(this).data("kode");
        var formAction = "/order/pendingDanProses/edit-status/" + kode;

        // Perbarui action atribut formulir dengan kode yang benar
        formAction = formAction.replace("kode", kode);
        console.log(formAction);

        // Setel atribut action pada formulir modal
        $("#ubahStatusForm").attr("action", formAction);

        $("#ubahStatus").modal("show");
    });

    setInterval(function () {
        table.ajax.reload(null, false);
    }, 5000);
});
