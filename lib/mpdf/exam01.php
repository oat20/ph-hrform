<?php
ob_start();
?>

<h1>สวัสดี</h1>
<p>Message กรุงเทพฯ</p>
<table border="1">
    <thead>
        <tr>
            <th>Col1</th>
            <th>Col1</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row1</td>
            <td>Row1</td>
        </tr>
        <tr>
            <td>Row2</td>
            <td>Row2</td>
        </tr>
        <tr>
            <td>Row3</td>
            <td>Row3</td>
        </tr>
    </tbody>
</table>

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
		'default_font' => 'sarabun',
        'margin_header' => 0,
        'margin_footer' => 0,
]);

$stylesheet = file_get_contents('mpdfstyletables-2.css');
$mpdf->autoLangToFont = true;
$mpdf->WriteHTML($stylesheet, 1);
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
ob_end_flush();
?>