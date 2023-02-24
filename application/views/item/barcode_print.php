<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?= $row->barcode ?> </title>
</head>

<body>
    <div>
        <?php
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        echo $generator->getBarcode($row->barcode, $generator::TYPE_CODE_128);
        ?>
        <div>
            <?= $row->barcode ?>
        </div>
    </div>
</body>

</html>