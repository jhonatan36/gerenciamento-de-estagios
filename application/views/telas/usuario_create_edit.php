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

                <form action="<?php echo base_url("usuario/$funcao"); ?>" method="post">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>CPF</label>
                                    <input name="cpf" type="text" class="form-control cpf" placeholder="999.999.999-99" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->cpf;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-tag form-control-feedback"></span>
                                </div>
                            </div>
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
                                    <label>Nome Completo</label>
                                    <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->nome;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>E-mail</label>
                                    <input name="email" type="email" class="form-control" placeholder="email@email.com" value="<?php
                                    if (isset($usuario)) {
                                        if ($usuario != NULL) {
                                            echo $usuario->email;
                                        }
                                    }
                                    ?>">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Telefone de contato</label>
                                    <input name="contato" type="text" class="form-control telefoneContato" placeholder="(99) 99999-9999" value="<?php
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
                                <div class="form-group">
                                    <label>Tipo de Usuário</label>
                                    <select id="tipo_usuario" name="tipo_usuario" class="form-control">
                                        <option value="">Escolha uma opção.</option>
                                        <?php foreach ($perfis as $key => $value) { ?>
                                            <option value="<?=$value->id;?>" <?php
                                            if (isset($usuario)) {
                                                if ($usuario != NULL && $usuario->perfil == $value->id) {
                                                    echo 'selected';
                                                }
                                            }
                                            ?>><?=$value->nome;?></option>
                                        <?php } ?>
                                    </select>
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
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-4">
                                
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
                            <div class="col-xs-1">
                                <a href="<?=base_url('usuario');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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