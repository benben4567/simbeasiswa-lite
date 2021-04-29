$(document).ready(function () {
  var nohp = new Cleave('#nohp', {
    phone: true,
    phoneRegionCode: 'ID'
  });

  $('#nohp').on('change', function () {
    var value = nohp.getRawValue()
    $("input[name=no_hp]").val(value);
  });

  // Auto dismiss alert
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 2000);
});
