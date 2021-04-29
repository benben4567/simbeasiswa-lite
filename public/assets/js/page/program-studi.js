$(document).ready(function () {
  var table = $("#example").DataTable({
    "lengthChange": false,
    "ordering": false,
    "columnDefs": [
      { "className": "text-center", "targets": "_all" },
      { "width": "10%", "target": 0},
      { "width": "15%", "target": 1},
      { "width": "60%", "target": 2},
      { "width": "10%", "target": 3}
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

  $('#example tbody').on('click', 'button.btn-edit', function () {
    var id = $(this).data('id');
    [ num, degree, nama ] = table.row($(this).parents('tr')).data();
    $('#id').val(id);
    $('#jenjang_edit').val(degree).selectric('refresh');
    $('#nama_edit').val(nama);
    $('#modal2').modal('show');
  });

  // Button Simpan - Modal Tambah
  $('#btn-simpan').on('click', function () {
    $("#form-tambah-prodi").submit();
  });

  // Button Simpan - Modal Edit
  $('#btn-simpan-edit').on('click', function () {
    $("#form-edit-prodi").submit();
  });

  // Auto dismiss alert
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 4000);
});
