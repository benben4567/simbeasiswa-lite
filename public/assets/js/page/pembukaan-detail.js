$(document).ready(function () {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  // Main Table
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
        text: '<i class="fas fa-plus"></i> Penerima',
        className: "btn btn-primary btn-sm mr-2",
        action: function ( e, dt, node, config ) {
            $('#modal1').modal('show');
        }
      },
      {
        text: '<i class="fas fa-file-excel"></i> Import',
        className: "btn btn-icon btn-success btn-sm",
        action: function ( e, dt, node, config ) {
            $('#modal3').modal('show');
        }
      }
    ]
  });

  table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

  // Table Mahasiswa inside Modal
  var table1 = $("#example2").DataTable({
    "lengthChange": false,
    "columnDefs": [
      { "className": "text-center", "targets": [1,3] },
      { "visible": false, "targets": 0 },
      { "width": "50%", "targets": 1 },
      { "width": "25%", "targets": 2 },
      { "width": "25%", "targets": 2 },
    ]
  });

  $('#example2 tbody').on( 'click', 'tr', function () {
    $(this).toggleClass('selected');
  });

  // Button Assign
  $(".btn-tambahkan").click(function (e) {
    e.preventDefault();
    var id = $('#id').val();
    var arr = [];
    var data = table1.rows('.selected').data();
    $.each(data, function (index, value) {
      arr.push(parseInt(value[0]));
    });
    console.log(arr)
    $.ajax({
      type: "post",
      url: '/beasiswa/assign-student',
      data: {id: id, data: arr},
      success: function (response) {
        if (response.success) {
          $('#modal1').modal('hide')
          location.reload();
        }
      }
    });
  });
  // Button Deassign
  $("#example tbody").on('click', 'button.btn-hapus', function () {
    var id = $('#id').val();
    var student_id = $(this).data('id');
    $.ajax({
      type: "post",
      url: "/beasiswa/deassign-student",
      data: {id: id, data: student_id},
      success: function (response) {
        if (response.success) {
          location.reload();
        }
      }
    });
  });
  // Button Import
  $('.btn-import').click(function (e) {
    e.preventDefault();
    $('#form-import-penerima').trigger('submit');
  });

  // Dropzone upload SK
  var dropzone = new Dropzone("#mydropzone", {
    url: "upload-document",
    acceptedFiles: 'application/pdf',
    maxFiles: 1,
    maxFilesize: 2,
    dictDefaultMessage: 'Lepaskan berkas atau klik disini untuk mengunggah',
    dictFileTooBig: 'Opss! Ukuran berkas terlalu besar.',
    dictInvalidFileType: 'Opss! Format berkas salah.',
    dictResponseError: 'Error unggah berkas!',
    sending: function(file, xhr, formData){
      formData.append('id', $('#id').val());
    },
    renameFile: function(file) {
      var nama = $('.nama').html() + ' ' + $('.periode').html();
      var nama_clean = nama.replace(/[ |/]/g,'_');
      return name = "SK_"+nama_clean+".pdf";
    },
    success: function(file, response){
      if (response.success) {
        if (confirm('Sukses. \nBerkas berhasil diunggah.')) {
          location.reload();
        } else {
          location.reload();
        }
      }
    },
    maxfilesexceeded: function(file) {
      this.removeAllFiles();
      this.addFile(file);
    },
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });

  $('.modal').on('hidden.bs.modal', function () {
    $('.custom-file-label').html('Pilih berkas');
  });

  var cleaveC = new Cleave('.currency', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
  });

  $('.nominal').html($('#nominal').val());

  // Auto dismiss alert
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});
