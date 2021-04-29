$(document).ready(function () {
  var table = $("#example").DataTable({
    "lengthChange": false,
    "ordering": false,
    "columnDefs": [
      { "className": "text-center", "targets": [0,2] },
      { "width": "15%", "target": 0},
      { "width": "65%", "target": 1},
      { "width": "20%", "target": 2},
    ],
    "buttons": [
      {
        text: '<i class="fas fa-plus"></i> Baru',
        className: "btn btn-primary btn-sm mx-1",
        action: function ( e, dt, node, config ) {
            $('#modal1').modal('show');
        }
      },
      {
        text: '<i class="fas fa-file-excel"></i> Import',
        className: "btn btn-success btn-sm mx-1",
        action: function ( e, dt, node, config ) {
            $('#modal2').modal('show');
        }
      }
    ]
  });

  table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

  // Button Simpan - Modal Tambah
  $('#btn-simpan').on('click', function () {
    $("#form-tambah-mahasiswa").submit();
  });

  // Button Simpan - Modal import
  $('#btn-import').on('click', function () {
    $("#form-import-mahasiswa").submit();
  });

  // Auto dismiss alert
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 4000);

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $('.modal').on('hidden.bs.modal', function () {
    $('.custom-file-label').html('Pilih berkas');
  });

  var nohp = new Cleave('#nohp', {
    phone: true,
    phoneRegionCode: 'ID'
  });

  $('#nohp').on('change', function () {
    var value = nohp.getRawValue()
    $("input[name=no_hp]").val(value);
  });
});
