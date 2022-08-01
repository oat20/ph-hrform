<?php
ob_start();
?>

<h1>สวัสดี</h1>

<?php
// Write some HTML code:
$html = ob_get_contents();

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
//require_once './src/Mpdf.php';
// Create an instance of the class:
//custom font
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/thsarabun',
    ]),
    'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' =>  'THSarabunNew Bold.ttf',
            ]
        ],
		'default_font' => 'sarabun'
]);

//$mpdf->autoScriptToLang = true;
$mpdf->WriteHTML($html);
//$mpdf->WriteHTML('สวัสดี');

// Output a PDF file directly to the browser
$mpdf->Output();
ob_end_flush();
?>