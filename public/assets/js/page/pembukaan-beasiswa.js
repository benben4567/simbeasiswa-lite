$(document).ready(function () {
  var table = $("#example").DataTable({
    "lengthChange": false,
    "ordering": false,
    "columnDefs": [
      { "className": "text-center", "targets": [0,2,3] },
    ],
    "buttons": [
      {
        text: 'Pembukaan Baru',
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
    $('input[name="nominal"]').val(cleaveC.getRawValue());
    $("#form-pembukaan").submit();
  });

  var cleaveC = new Cleave('.currency', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });

  $('#modal1').on('hidden.bs.modal', function(){
    $('form').trigger('reset');
  });

  // Auto dismiss alert
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
  }, 4000);
});
