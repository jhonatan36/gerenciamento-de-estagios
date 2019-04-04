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

                <form action="<?php echo base_url("usuario/$funcao"); ?>" method="post">
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
                    <div class="form-group has-feedback">
                        <label>Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php
                        if (isset($usuario)) {
                            if ($usuario != NULL) {
                                echo $usuario->nome;
                            }
                        }
                        ?>">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>Sobrenome</label>
                        <input name="sobrenome" type="text" class="form-control" placeholder="Sobrenome" value="<?php
                        if (isset($usuario)) {
                            if ($usuario != NULL) {
                                echo $usuario->sobrenome;
                            }
                        }
                        ?>">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
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
                    <div class="form-group has-feedback">
                        <label>Contato</label>
                        <input name="contato" type="text" class="form-control" placeholder="Contato" value="<?php
                        if (isset($usuario)) {
                            if ($usuario != NULL) {
                                echo $usuario->contato;
                            }
                        }
                        ?>">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>Senha</label>
                        <input name="senha" type="password" class="form-control" placeholder="Senha">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label>Confirme a senha</label>
                        <input name="conf_senha" type="password" class="form-control" placeholder="Repetir senha">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group">
                        <label>Status do usuário</label>
                        <select name="status" class="form-control">
                            <option value="0">Suspenso</option>
                            <option value="1">Ativo</option>
                        </select>
                    </div>
                    <?php if (isset($usuario)) { ?>
                        <input type="hidden" name="idusuario" value="<?php
                        if ($usuario != NULL) {
                            echo $usuario->idusuario;
                        }
                        ?>"/>
                           <?php } ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            <a href="<?=base_url('usuario');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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