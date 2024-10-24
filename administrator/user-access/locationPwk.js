$(document).ready(function () {
  $('#sort').on('change', function () {
    const selectedPackage = $('#sort').val();
    $('#selected').text(selectedPackage);
    if (selectedPackage == 'proses') {
      document.location.href = 'dashboard_users.php?halaman=p_prosesPwk';
    } else if (selectedPackage == 'OK Test') {
      document.location.href = 'dashboard_users.php?halaman=p_okTestPwk';
    } else if (selectedPackage == 'MCU') {
      document.location.href = 'dashboard_users.php?halaman=p_Mcupwk';
    } else if (selectedPackage == 'OK MCU') {
      document.location.href = 'dashboard_users.php?halaman=p_okMcupwk';
    } else if (selectedPackage == 'NG MCU') {
      document.location.href = 'dashboard_users.php?halaman=p_ngMcupwk';
    } else if (selectedPackage == 'training') {
      document.location.href = 'dashboard_users.php?halaman=p_trainingPwk';
    } else if (selectedPackage == 'selesai') {
      document.location.href = 'dashboard_users.php?halaman=p_selesaiPwk';
    } else {
    }
  });
});
