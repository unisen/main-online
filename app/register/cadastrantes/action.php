<?php session_start();

if (isset($_SESSION["url_aplicativo"])) {
    $unisen_url = $_SESSION["url_aplicativo"];
}


function format_folder_size($size)
{
    if ($size >= 1073741824) {
        $size = number_format($size / 1073741824, 2) . ' GB';
    } elseif ($size >= 1048576) {
        $size = number_format($size / 1048576, 2) . ' MB';
    } elseif ($size >= 1024) {
        $size = number_format($size / 1024, 2) . ' KB';
    } elseif ($size > 1) {
        $size = $size . ' bytes';
    } elseif ($size == 1) {
        $size = $size . ' byte';
    } else {
        $size = '0 bytes';
    }
    return $size;
}



function get_folder_size($folder_name)
{
    $total_size = 0;
    $file_data = scandir($folder_name);
    foreach ($file_data as $file) {
        if ($file === '.' or $file === '..') {
            continue;
        } else {
            $path = $folder_name . '/' . $file;
            $total_size = $total_size + filesize($path);
        }
    }
    return format_folder_size($total_size);
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "fetch") {
        $folder = array_filter(glob('*'), 'is_dir');

        $output = '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Pasta</th>
    <th>Total Arquivos</th>
    <th>Tamanho</th>
    <th>Editar Nome</th>
    <th>Deletar Pasta</th>
    <th>Enviar Arquivos</th>
    <th>Lista de Arquivos</th>
   </tr>
   ';
        if (count($folder) > 0) {
            if (isset($_GET['crm'])) {
                $crm = $_GET['crm'];
            } else {
                $crm = "";
            }

            foreach ($folder as $name) {
                if ($crm != "" && $name == $crm) {
                    $folder_select = "pasta-select";
                } else {
                    $folder_select = "";
                }

                $output .= '
     <tr id="' . $folder_select . '">
      <td>' . $name . '</td>
      <td>' . (count(scandir($name)) - 2) . '</td>
      <td>' . get_folder_size($name) . '</td>
      <td><button type="button" name="update" data-name="' . $name . '" class="update btn btn-warning btn-xs">Atualizar</button></td>
      <td><button type="button" name="delete" data-name="' . $name . '" class="delete btn btn-danger btn-xs">Apagar</button></td>
      <td><button type="button" name="upload" data-name="' . $name . '" class="upload btn btn-info btn-xs">Upload</button></td>
      <td><button type="button" name="view_files" data-name="' . $name . '" class="view_files btn btn-default btn-xs">Visualizar</button></td>
     </tr>';
            }
        } else {
            $output .= '
    <tr>
     <td colspan="6">Nenhuma pasta encontrada</td>
    </tr>
   ';
        }
        $output .= '</table>';
        echo $output;
    }

    if ($_POST["action"] == "create") {
        if (!file_exists($_POST["folder_name"])) {
            mkdir($_POST["folder_name"], 0777, true);
            echo 'Pasta Criada';
        } else {
            echo 'Pasta já criada';
        }
    }
    if ($_POST["action"] == "change") {
        if (!file_exists($_POST["folder_name"])) {
            rename($_POST["old_name"], $_POST["folder_name"]);
            echo 'Alteração do nome da pasta';
        } else {
            echo 'Pasta já criada';
        }
    }

    if ($_POST["action"] == "delete") {
        $files = scandir($_POST["folder_name"]);
        foreach ($files as $file) {
            if ($file === '.' or $file === '..') {
                continue;
            } else {
                unlink($_POST["folder_name"] . '/' . $file);
            }
        }
        if (rmdir($_POST["folder_name"])) {
            echo 'Pasta Deletada';
        }
    }

    if ($_POST["action"] == "fetch_files") {
        $file_data = scandir($_POST["folder_name"]);
        $output = '
  <table class="table table-bordered table-striped">
   <tr>    
    <th>Nome do Arquivo</th>
    <th>Deletar</th>
   </tr>
  ';

        foreach ($file_data as $file) {
            if ($file === '.' or $file === '..') {
                continue;
            } else {
                $path = $_POST["folder_name"] . '/' . $file;



                $output .= '
        <tr>        
        <td contenteditable="true" data-folder_name="' . $_POST["folder_name"] . '"  data-file_name = "' . $file . '" class="change_file_name">' . $file . '</td>
        <td><button name="remove_file" class="remove_file btn btn-danger btn-xs" id="' . $path . '">Remover</button></td>
        </tr>
        ';
            }
        }
        $output .= '</table>';
        echo $output;
    }

    if ($_POST["action"] == "remove_file") {
        if (file_exists($_POST["path"])) {
            unlink($_POST["path"]);
            echo 'Arquivo Deletado';
        }
    }

    if ($_POST["action"] == "change_file_name") {

        $old_name = $_POST["folder_name"] . '/' . $_POST["old_file_name"];
        $new_name = $_POST["folder_name"] . '/' . $_POST["new_file_name"];
        if ($old_name != $new_name) {
            if (rename($old_name, $new_name)) {
                echo 'Alteração do nome do arquivo com sucesso';
            } else {
                echo 'Há um erro';
            }
        }
    }
}
