$(document).ready(function () {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  var table = $("#example").DataTable({
    "lengthChange": false,
    "ordering": false,
    "columnDefs": [
      { "className": "text-center", "targets": "_all" },
      { "width": "10%", "target": 0},
      { "width": "15%", "target": 1},
      { "width": "15%", "target": 3}
    ],
    "buttons": [
      {
        text: '<i class="fas fa-plus"></i> Baru',
        className: "btn btn-primary btn-sm",
        action: function ( e, dt, node, config ) {
            $('#modal1').modal('show');
        }
      }
    ]
  });

  table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

  // Button Simpan - Modal Tambah
  $('#btn-simpan').on('click', function () {
    $("#form-tambah-pengguna").submit();
  });

  // Button Simpan - Modal Edit
  $('#btn-simpan-edit').on('click', function () {
    $("#form-edit-pengguna").submit();
  });

  $('a.btn-edit').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
      type: "GET",
      url: `pengguna/show/${id}`,
      data: "",
      dataType: "json",
      success: function (response) {
        const { id, email, name, role } = response.data;
        $('input[name="id"]').val(id);
        $('#name_edit').val(name);
        $('#email_edit').val(email);
        $('#role_edit').val(role).selectric('refresh');
        $('#modal2').modal('show');
      }
    });
  });

  $('input.toggle').on('change', function () {
    let status = '';
    if (this.checked) {
      status = 'aktif';
    } else {
      status = 'non-aktif';
    }
    // console.log($(this).data('id') + '-' + status);
    let id = $(this).data('id');
    $.ajax({
      type: "put",
      url: "/pengguna/status",
      data: {status: status, id: id},
      dataType: "json",
      success: function (response) {
        if (response.success) {
          location.reload();
        }
      }
    });
  });

  // Auto dismiss alert
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 4000);

  $('.modal').on('hidden.bs.modal', function() {
    $('form').trigger('reset');
  });
});
