$(document).ready(function () {
  $('#sort').on('change', function () {
    const selectedPackage = $('#sort').val();
    $('#selected').text(selectedPackage);
    if (selectedPackage == 'proses') {
      document.location.href = 'index.php?halaman=p_prosesCkr';
    } else if (selectedPackage == 'OK Test') {
      document.location.href = 'index.php?halaman=p_okTestCkr';
    } else if (selectedPackage == 'MCU') {
      document.location.href = 'index.php?halaman=p_Mcuckr';
    } else if (selectedPackage == 'OK MCU') {
      document.location.href = 'index.php?halaman=p_okMcuckr';
    } else if (selectedPackage == 'NG MCU') {
      document.location.href = 'index.php?halaman=p_ngMcuckr';
    } else if (selectedPackage == 'training') {
      document.location.href = 'index.php?halaman=p_trainingCkr';
    } else if (selectedPackage == 'selesai') {
      document.location.href = 'index.php?halaman=p_selesaiCkr';
    } else {
    }
  });
});
