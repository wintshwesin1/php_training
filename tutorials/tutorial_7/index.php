<?php

declare(strict_types=1);

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('vendor/autoload.php');

$options = new QROptions(
    [
        'eccLevel' => QRCode::ECC_L,
        'outputType' => QRCode::OUTPUT_MARKUP_SVG,
        'version' => 5,
    ]
);

if(isset($_POST['generate'])){
    $txt = $_POST['text'];
    $qrcode = (new QRCode($options))->render($txt);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Create QR Codes in PHP</title>
    <style>
        .container {
            width : 500px;
            margin : 100px auto;
            text-align : center;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            width: 100%;
        }

        .btn {
            width: 80px;
            padding: 8px;
            background-color: #1CB6E0;
            border: 1px solid #1CB6E0;
            border-radius:5px;
            color: #fff;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Creating QR Codes in PHP</h1>
    <form action="" method="post">
        <input type="text" name="text">
        <br>
        <input type="submit" name="generate" value="Generate" class="btn">
    </form>
    <?php if(!empty($qrcode)){ echo $qrcode; } ?>
</div>
</body>
</html>