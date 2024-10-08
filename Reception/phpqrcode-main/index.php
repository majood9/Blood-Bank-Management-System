<?php


echo "<h1>PHP QR Code</h1><hr/>";

//set it to writable location, a place for temp generated PNG files
$PNG_TEMP_DIR = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR;

//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "qrlib.php";

//of course we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR . 'test.png';

//processing form input
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('H')))
    $errorCorrectionLevel = $_REQUEST['level'];

$matrixPointSize = 4;
if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);



if (isset($_REQUEST['data']) ) {

    //it's very important!
    if (trim($_REQUEST['data']) == '' )
        die('data cannot be empty! <a href="?">back</a>');

    // user data
    $filename = $PNG_TEMP_DIR . 'test' . md5($_REQUEST['data'] . '|' . $errorCorrectionLevel . '|' . $matrixPointSize)  . '.png';
    QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);
} else {

    //default data
    // echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
}




//display generated file
// echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';

//config form
echo '<form action="../../../../../../m&n/Reception/user2dashboard.php" method="post">
        Data:&nbsp;<input name="data" value="' . (isset($_REQUEST['data']) ? htmlspecialchars($_REQUEST['data']) : 'PHP QR Code :)') . '" />&nbsp<br>;

        ECC:&nbsp;<select name="level">
            <option value="H"' . (($errorCorrectionLevel == 'H') ? ' selected' : '') . '>H - best</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';

for ($i = 10; $i <= 10; $i++)
    echo '<option value="' . $i . '"' . (($matrixPointSize == $i) ? ' selected' : '') . '>' . $i . '</option>';

echo '</select>&nbsp;
         <input type="submit" value="GENERATE"></form><hr/>';
//<a href=" ../../../../../../m&n/Reception/user2dashboard.php " type="submit">GENERATE</a><hr>;';

echo '<img src="' . $PNG_WEB_DIR . basename($filename) . '" /><hr/>';
// header("location:../../../../user2dashboard.php");
?>

<!-- header("location:../Reception/index.php"); -->