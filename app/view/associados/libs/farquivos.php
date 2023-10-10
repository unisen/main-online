<?php

/** Functions */

function custom_copy($src, $dst) {   
    // open the source directory
    $dir = opendir($src);  
    // Make the destination directory if not exist
    @mkdir($dst);   
    // Loop through the files in source directory
    while( $file = readdir($dir) ) {   
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) 
            {   
                // Recursively calling custom copy function
                // for sub directory 
                custom_copy($src . '/' . $file, $dst . '/' . $file);   
            } 
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    }   
    closedir($dir);
}

function create_cadastrante ($indice, $nome, $crm, $crm_uf, $mode = 0) {
    if ($mode != 0) {
        if (!is_dir("./cadastrantes/". $indice . " - " . $nome . "/")) mkdir("./cadastrantes/". $indice . " - " . $nome . "/",0777,true);
        $src =  dirname(__FILE__) . "/cadastrantes/1000 - MODELO";
        $dst =  dirname(__FILE__) . "/cadastrantes/$indice - $nome";
        custom_copy($src, $dst);
        return 1;
    }
    else {
        if (!is_dir("./cadastrantes/". $crm . $crm_uf . "/")) mkdir("./cadastrantes/". $crm . $crm_uf . "/",0777,true);
        $src =  dirname(__FILE__) . "/cadastrantes/1000 - MODELO";
        $dst =  dirname(__FILE__) . "/cadastrantes/$crm$crm_uf";
        custom_copy($src, $dst);
        return 1;
    }
}



/**
 * MODE = 0 -> em verificação
 */


/* $path_parts = pathinfo('/cadastrantes/1000 - MODELO/');
echo $path_parts['dirname'], "<br>";
echo $path_parts['basename'], "<br>";
echo $path_parts['extension'], "<br>";
echo $path_parts['filename']; */

/* if (create_cadastrante("999", "Diego Fernandes", "696969", "GO", 0) == 1) {
    echo "Pasta Criada";
}
 */
//echo dirname(__FILE__);  
//custom_copy($src, $dst);



function lista_arquivos ($diretorio) {
    if ($handle = opendir($diretorio)) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != "..") {

                $arr_files = explode(" - ", $entry);
                echo "$arr_files[1] <br>";
                //$arr_1 = explode(" [1]", $arr_files[1]);
                //echo "$arr_1[0] <br>";
                //echo "$entry <br>";
            }
        }

        closedir($handle);
    }
}

