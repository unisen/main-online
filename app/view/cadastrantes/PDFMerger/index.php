<?php 

require_once('fpdf.php');
require_once(__DIR__ . '/FPDI/src/autoload.php');

//use setasign\Fpdi;

$pdf = new \setasign\Fpdi\Fpdi();

//$arquivos = ['doc1.pdf', 'doc2.pdf'];

$arquivos = ['files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [1].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [2].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [3].pdf'];



foreach ($arquivos as $arquivo) {
    $pageCount = $pdf->setSourceFile($arquivo);
    for ($i = 0; $i < $pageCount; $i++) {
        $tpl = $pdf->importPage($i + 1);
        $pdf->addPage();
        $pdf->useTemplate($tpl);
    }
}
//Dowload direto
$pdf->Output('F','LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA.pdf');

/* 
include('FPDF/fpdf.php');
include('FPDI/src/Fpdi.php');

include('FPDI/src/Tfpdf/Fpdi.php');

include('FPDI/src/autoload.php');

use setasign\Fpdi\Tcpdf\Fpdi;

$files = ['doc1.pdf', 'doc2.pdf', 'foto.pdf'];

use setasign\Fpdi\FpdfTpl;

$pdf = new \setasign\Fpdi\Fpdi();

//$pdf = new \setasign\Fpdi\Fpdi();

//$pdf = new \setasign\Fpdi\TcpdfFpdi;


// iterate over array of files and merge
foreach ($files as $file) {
    $pageCount = $pdf->setSourceFile($file);
    for ($i = 0; $i < $pageCount; $i++) {
        $tpl = $pdf->importPage($i + 1, '/MediaBox');
        $pdf->addPage();
        $pdf->useTemplate($tpl);
    }
}

// output the pdf as a file (http://www.fpdf.org/en/doc/output.htm)
$pdf->Output('D','merged.pdf'); */