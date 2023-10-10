<div class="modal fade" id="modalViewCadastrante" tabindex="-1" role="dialog" aria-labelledby="modalViewCadastrante">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content b-0">
            <div class="modal-header r-0 bg-primary">
                <h6 class="modal-title text-white" id="exampleModalLabel">Verificar Cadastrante</h6>
                <a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle paper-nav-white active"><i></i></a>
            </div>
            <input type="hidden" name="id_cadastrante_view" id="id_cadastrante_view" value="">
            <div class="modal-body no-p no-b">

                <!-- FORM Verificar ASSOCIADO -->
                <div class="card">
                    <div class="card-body b-b">
                    
                      
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

        $("#modalViewCadastrante").on('hide.bs.modal', function() {
            location.reload();
        });

    });
</script>