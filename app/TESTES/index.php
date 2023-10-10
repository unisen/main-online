<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <input type="button" onClick="CallMe()" value="Open USB" />
        <input type="button" onClick="CallMe()" value="Abrir Pasta">
        <br><br><hr><br><br>

        <?php
$protocolo = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == "on") ? "https" : "http");
$url = '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'];

echo $protocolo . $url;
echo '<pre>';
print_r($_SERVER);
echo '</pre>';


//shell_exec('cd C:\xampp\htdocs\unisen-main\app\register\cadastrantes');
//shell_exec('start .');
?>

<a href="\\Desktop-vqa090p\d">Open folder</a>
    <script src="" async defer></script>


    <script>
        function CallMe() {
           // window.open("file://E$");
          windows.opendir("C://xampp/htdocs");
        }
    </script>


</body>

</html>