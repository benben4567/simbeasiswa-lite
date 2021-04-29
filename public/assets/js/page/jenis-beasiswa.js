$(document).ready(function () {
  var table = $("#example").DataTable({
    "lengthChange": false,
    "ordering": false,
    "columnDefs": [
      { "className": "text-center", "targets": [0,2,3] },
      { "width": "15%", "targets": 0 },
      { "width": "50%", "targets": 1 },
      { "width": "20%", "targets": 2 },
      { "width": "15%", "targets": 3 },
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
    let id = $(this).data('id');
    let data = table.row($(this).parents('tr')).data();
    $("input[name='id']").val(id);
    $("#name-edit").val(data[1]);
    $("#sponsor-edit").val(data[2]);

    $('#modal2').modal('show');
  });

  // Button Simpan - Modal Tambah
  $('#btn-simpan').on('click', function () {
    $("#form-tambah-jenis").submit();
  });

  // Button Simpan - Modal Edit
  $('#btn-simpan-edit').on('click', function () {
    $("#form-edit-jenis").submit();
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
