<?php 

require_once('fpdf.php');
require_once('FPDI/src/autoload.php');

//use setasign\Fpdi;

function merge_pdf_cadastrante($arquivos, $nome_arquivo, $output = 'F') {
//$arquivos = ['doc1.pdf', 'doc2.pdf'];

    $pdf = new \setasign\Fpdi\Fpdi();
    //$arquivos = ['files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [1].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [2].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [3].pdf'];

    foreach ($arquivos as $arquivo) {
        $pageCount = $pdf->setSourceFile($arquivo);
        for ($i = 0; $i < $pageCount; $i++) {
            $tpl = $pdf->importPage($i + 1);
            $pdf->addPage();
            $pdf->useTemplate($tpl);
        }
    }
    //Dowload direto
    $pdf->Output($output, $nome_arquivo);

    return 1;
}

/* $nome_documento = 'LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA.pdf';

$documentos = ['files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [1].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [2].pdf', 'files/LARISSA PFRIMER CAPUZZO - CARTA DE EXPERIENCIA [3].pdf'];


merge_pdf_cadastrante($documentos, $nome_documento); */
