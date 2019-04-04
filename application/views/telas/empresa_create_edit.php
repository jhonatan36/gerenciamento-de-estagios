<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <?php
            if ($this->session->flashdata('mensagem') != NULL) {
                echo $this->session->flashdata('mensagem');
            }
            ?>

            <div class="register-box-body">
                <p class="login-box-msg"><?php echo $titulo; ?></p>

                <form action="<?php echo base_url("empresa/$funcao"); ?>" method="post">
                    <div class="form-group has-feedback">
                        <label>Razão Social</label>
                        <input name="razao_social" type="text" class="form-control" placeholder="Razão Social" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->razao_social;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>CNPJ</label>
                        <input name="cnpj" type="text" class="form-control" placeholder="99.999.999/9999-99" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->cnpj;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Início do Vínculo</label>
                        <input name="inicio_vinculo" type="date" class="form-control" placeholder="" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->inicio_vinculo;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Término do Vínculo</label>
                        <input name="final_vinculo" type="date" class="form-control" placeholder="" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->final_vinculo;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Cidade</label>
                        <input name="cidade" type="text" class="form-control" placeholder="Cidade" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->cidade;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Bairro</label>
                        <input name="bairro" type="text" class="form-control" placeholder="Bairro" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->bairro;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Logradouro</label>
                        <input name="endereco" type="text" class="form-control" placeholder="Logradouro" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->endereco;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>CEP</label>
                        <input name="cep" type="text" class="form-control" placeholder="99.999-999" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->cep;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>E-mail</label>
                        <input name="email" type="email" class="form-control" placeholder="email@email.com" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->email;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group has-feedback">
                        <label>Contato</label>
                        <input name="contato" type="text" class="form-control" placeholder="(99)99999-9999" value="<?php
                        if (isset($empresa)) {
                            if ($empresa != NULL) {
                                echo $empresa->contato;
                            }
                        }
                        ?>">
                    </div>
                    <?php if (isset($empresa)) { ?>
                        <input type="hidden" name="idempresa" value="<?php
                        if ($empresa != NULL) {
                            echo $empresa->idempresa;
                        }
                        ?>"/>
                           <?php } ?>
                    <hr/>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            <a href="<?=base_url('empresa');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->