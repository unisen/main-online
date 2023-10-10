<?php session_start();

header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1
header('Pragma: no-cache'); // HTTP 1.0
header('Expires: 0'); // Proxies

if (isset($_SESSION["url_aplicativo"])) {
  $unisen_url = $_SESSION["url_aplicativo"];
}


if (isset($_POST['pdfSelect'])) {
  $pdf_select = $_POST['pdfSelect'];
  $tempPdf = explode("../../",$pdf_select);

  $protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS']=="on") ? "https" : "http");

  $url = '://'.$_SERVER['HTTP_HOST'].$unisen_url.'app/'.$tempPdf[1];
  $pdf_select = $protocolo.$url;

  if(isset($_SESSION['useridCadastrante'])){
    $useridClick = $_SESSION['useridCadastrante'];
  }
  else {
    $useridClick = '';
  }

?>

<a href="#" type="button" class="btn-display-dados" id="abre-tela-dados" onclick="abre_tela_dados(<?php echo $useridClick; ?>)"><i class="icon-database"></i></a>

<a href="#" type="button" class="btn-close-display-dados" onclick="fecha_tela_dados()"><i class="icon-close"></i></a>



 <?php if($_SERVER['HTTP_HOST'] == 'localhost' or strpos($_SERVER['HTTP_HOST'],"192.168") !== false) { ?>

    <iframe src="<?php echo "$pdf_select"; ?>" id="docFrame" title="Documentos PDF" style="width:100%; height:100%;" frameborder="0"></iframe>
 
 <?php } else { ?>

  <iframe src="<?php echo "https://docs.google.com/viewer?url=$pdf_select&embedded=true"; ?>" id="docFrame" title="Documentos PDF" style="width:100%; height:100%;" frameborder="0"></iframe>

 <?php } ?>

<?php
}