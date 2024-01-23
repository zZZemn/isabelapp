<?php
include('components/header.php');
?>

<h4 class="page-title"><i class="bi bi-qr-code"></i> QR Code</h4>

<?php
include('components/footer.php');
?>
<script>
    // Import the qrcode library
    const qr = require('qrcode');

    // Data to be encoded in the QR code
    const data = "Hello, this is a QR Code example!";

    // Options for generating the QR code (you can adjust these as needed)
    const options = {
        type: 'png', // Output type (png, svg, etc.)
        rendererOpts: {
            quality: 0.3 // Image quality (only for png type)
        }
    };

    // Generate QR code as a data URI
    qr.toDataURL(data, options, (err, url) => {
        if (err) throw err;

        console.log(url);
    });

    $(document).ready(function() {
        $('.nav-qr').addClass('nav-selected');
        $('.nav-manage').addClass('nav-selected');
    });
</script>