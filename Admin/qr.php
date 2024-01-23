<?php
include('components/header.php');
?>

<h4 class="page-title"><i class="bi bi-qr-code"></i> QR Code</h4>
<div class="container mt-4 table-container d-flex flex-wrap">
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
    <div class="qr-container card m-2">
        <img src="../assets/qr-codes/qrcode_localhost.png">
        <h6 class="text-center">News Update</h6>
    </div>
</div>
<?php
include('components/footer.php');
?>
<script>
    $(document).ready(function() {
        $('.nav-qr').addClass('nav-selected');
        $('.nav-manage').addClass('nav-selected');
    });
</script>