<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('SMK Prestasi Prima');
$pdf->SetAuthor('Poin Pelanggaran Siswa');
$pdf->SetTitle('Laporan Kelas');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set some text for example
$title = <<<EOD
<h3>Laporan Kelas </h3>
EOD;
$pdf->writeHTMLCell(0, 0, '', '', $title, 0, 1, 0, true, 'C', true);
$table = '<table style="border: 1px solid #000; padding:6px;">';
$table .= '<tr style="background-color: #ccc;">
                <th border="1" width="10%">No</th>
                <th border="1" align="left" width="50%">Kelas</th>
                <th border="1" align="center" width="10%">Jumlah Siswa</th>
            </tr>';
$i = 1;
foreach ($kelas as $k) {
    $table .= '<tr>
                <td border="1">' . $i++ . '</td>
                <td border="1" align="left">' . $k['kelas'] . '</td>
                <td border="1" align="center">' . $k['jumlah_siswa'] . '</td>
                </tr>';
}
$table .= '</table>';
$pdf->writeHTMLCell(0, 0, 50, '', $table, 0, 1, 0, true, 'C', true);
$pdf->lastPage();

$timeDay = date('l');
$timeDate = date('d');
$timeMonth = date('F ');
$timeYear = date('Y');
$date = <<<EOD
<h4>$timeDay, $timeDate $timeMonth $timeYear</h4>
EOD;
$pdf->writeHTMLCell(0, 0, 0, 230, $date, 0, 1, FALSE, TRUE, 'R', TRUE);

$name = "<h4>Daud Martupa Sitinjak <br> (Wakil Kesiswaaan)</h4>";
$pdf->writeHTMLCell(0, 0, 150, 260, $name, 0, 1, 0, true, 'C', true);
// ---------------------------------------------------------
ob_clean();
//Close and output PDF document
$pdf->Output('laporan_kelas.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
