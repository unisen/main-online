<?php
require_once "../../crud/script/pdocrud.php";

                    $pdocrud = new PDOCrud();

                    echo $pdocrud->dbTable("tipos_documentos")->render();

                    $pdocrud->dbTable("tipos_documentos")->render("insertform");
                    //$pdocrud->dbTable("tbl_cadastrantes")->render("editform");
                    
                    /* $pdocrud->addCallback("after_update", "afterUpdateCallBack"); 
                    $pdocrud->addCallback("before_update", "beforeUpdateCallBack"); */
