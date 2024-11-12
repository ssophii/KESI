$(document).ready(function () {
    $('.btn-primary').on('click', function () {
        var id = $(this).data('id');
        $('#riwayatId').val(id);

        $.ajax({
            url: '/riwayat-kesehatan/' + id,
            method: 'GET',
            success: function (data) {
                $('#name').val(data.pasien.user.name);
                $('#usia').val(data.pasien.usia);
                $('#diagnosa').val(data.diagnosa);
                $('#tanggal').val(data.tanggal);
                $('#exampleModal').modal('show');
            }
        });
    });

    $('#editForm').on('submit', function (e) {
        e.preventDefault();
        var id = $('#riwayatId').val();

        $.ajax({
            url: '/riwayat-kesehatan/' + id,
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('#exampleModal').modal('hide');
                location.reload();
            }
        });
    });

    $('#deleteBtn').on('click', function () {
        var id = $('#riwayatId').val();

        $.ajax({
            url: '/riwayat-kesehatan/' + id,
            method: 'DELETE',
            data: { _token: csrfToken },
            success: function (response) {
                $('#exampleModal').modal('hide');
                location.reload();
            }
        });
    });
});
