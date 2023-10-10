<div class="modal fade" id="modalNovoCadastrante" tabindex="-1" role="dialog" aria-labelledby="modalNovoCadastrante">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Adicionar Cadastrante</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <div class="modal-body no-p no-b">

                <!-- FORM NOVO ASSOCIADO -->
                <div class="card">
                    <div class="card-body b-b">
                        <!--  <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputEmail4" class="col-form-label">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6 focused">
                                        <label for="inputPassword4" class="col-form-label">Password</label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress" class="col-form-label">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2" class="col-form-label">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState" class="col-form-label">State</label>
                                        <select id="inputState" class="form-control">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip" class="col-form-label">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox"> Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </form> -->
                        <?php
                        require_once "../../crud/script/pdocrud.php";
                        $pdocrud = new PDOCrud();

                        $pdocrud->buttonHide($buttonname = "cancel");

                        $pdocrud->fieldAttributes("CONTRATO", array("placeholder"=>"Insira um número para o contrato. ex: 000_2023"));//add placeholder attribute
                        
                        //change state to select dropdown
                        $pdocrud->fieldTypes("SEXO", "select");
                        //add data using array in select dropdown
                        $pdocrud->fieldDataBinding("SEXO", array("masculino" => "masculino", "feminino" => "feminino"), "", "", "array");

                        $pdocrud->fieldTypes("ESTADO CIVIL", "select");
                        $pdocrud->fieldDataBinding("ESTADO CIVIL", array("solteiro" => "Solteiro(a)", "casado" => "Casado(a)", "divorciado" => "Divorciado(a)", "viuvo" => "Viúvo(a)"), "", "", "array");          


                        $pdocrud->fieldTypes("DATA DE NASCIMENTO", "date");
                        $pdocrud->fieldCssClass("DATA DE NASCIMENTO", array("colordate", "r-0", "light", "s-12", "datePicker"));// add css classes
                        $pdocrud->fieldAttributes("DATA DE NASCIMENTO", array("data-time-picker"=>"false", "data-format-date"=>"d/m/Y"));
                        
                        
                        $pdocrud->fieldAttributes("E-MAIL", array("data-type"=>"email"));// any attribute name and it's value

                        //$pdocrud->formDisplayInPopup("Adicionar", "Dados do Cadastrante", true);

                        //Adding callback functions

                        /* $pdocrud->addCallback("before_insert", "beforeInsertCallBack");


                        function beforeInsertCallBack($data, $this) {
                        
                            // print_r($data); to print complete data, this data can be checked in firebug console.
                        
                            $data["login"]["user_name"]= ucfirst(trim($data["login"]["user_name"]));
                        
                            return $data;
                        
                        } */

                        $pdocrud->dbTable("tbl_cadastrantes")->render();

                        
                        echo $pdocrud->dbTable("tbl_cadastrantes")->render("insertform");
                        ?>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <div class="form-row row clearfix">
                    <!-- <button class="btn btn-primary l-s-1 s-12 text-uppercase" onclick="" type="submit" id="next2" name="submit">
                                    Cadastrar
                                </button> -->

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#modalNovoCadastrante").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>