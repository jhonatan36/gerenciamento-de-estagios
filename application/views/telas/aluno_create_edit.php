<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">

            <?php
            if ($this->session->flashdata('mensagem') != NULL) {
                echo $this->session->flashdata('mensagem');
            }
            ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>

                <form role="form" action="<?php echo base_url("aluno/$funcao"); ?>" method="post">
                    <div class="box-body">
                        <input type="hidden" name="tipo_usuario" value="1" />
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>CPF</label>
                                    <input name="cpf" type="text" class="form-control" placeholder="" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->cpf;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Nome Completo</label>
                                    <input name="nomeCompleto" type="text" class="form-control" placeholder="Nome Completo" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->nomeCompleto;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>E-mail</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->email;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Matrícula</label>
                                    <input name="matricula" type="text" class="form-control" placeholder="Matrícula" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->matricula;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Telefone de Contato</label>
                                    <input name="contato" type="text" class="form-control" placeholder="Contato" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->contato;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Carga horária cumprida (Período)</label>
                                    <input name="cargaHoraria" type="text" class="form-control" placeholder="" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->cargaHoraria;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <label>Status do usuário</label>
                                <select name="status" class="form-control">
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>
                            </div>    
                        </div>

                        <?php if (isset($usuario)) { ?>
                            <input type="hidden" name="idusuario" value="<?php
                            if ($usuario != NULL) {
                                echo $usuario->idusuario;
                            }
                            ?>"/>
                        <?php } ?>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-1">
                                <a href="<?=base_url('aluno');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->