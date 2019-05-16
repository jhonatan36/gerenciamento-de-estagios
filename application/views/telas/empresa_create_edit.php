<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">

            <?php
            if ($this->session->flashdata('msg') != NULL) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>

                <form action="<?php echo base_url("empresa/$funcao"); ?>" method="post">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>CNPJ</label>
                                    <input name="cnpj" type="text" class="form-control cnpj" placeholder="99.999.999/9999-99" value="<?php
                                    if (isset($empresa)) {
                                        if ($empresa != NULL) {
                                            echo $empresa->cnpj;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Telefone de Contato</label>
                                    <input name="contato" type="text" class="form-control telefoneContato" placeholder="(99) 99999-9999" value="<?php
                                    if (isset($empresa)) {
                                        if ($empresa != NULL) {
                                            echo $empresa->contato;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>CEP</label>
                                    <input name="cep" type="text" class="form-control cep" placeholder="99.999-999" value="<?php
                                    if (isset($empresa)) {
                                        if ($empresa != NULL) {
                                            echo $empresa->cep;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
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
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
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
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Número</label>
                                    <input name="numero" type="text" class="form-control" placeholder="Número" value="<?php
                                    if (isset($empresa)) {
                                        if ($empresa != NULL) {
                                            echo $empresa->numero;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Complemento</label>
                                    <input name="complemento" type="text" class="form-control" placeholder="Complemento" value="<?php
                                    if (isset($empresa)) {
                                        if ($empresa != NULL) {
                                            echo $empresa->complemento;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if(isset($empresa) && $empresa->status == 1){echo 'selected';} ?>>Ativo</option>
                                        <option value="0" <?php if(isset($empresa) && $empresa->status == 0){echo 'selected';} ?>>Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <?php if (isset($empresa)) { ?>
                            <input type="hidden" name="idempresa" value="<?php
                            if ($empresa != NULL) {
                                echo $empresa->idempresa;
                            }
                            ?>"/>
                        <?php } ?>
                    </div>
                    
                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-1">
                                <a href="<?=base_url('empresa');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
                            </div>
                            <div class="col-md-1 col-md-offset-10">
                                <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->