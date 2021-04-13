<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Gerenciamento de Estágio Supervisionado - SI UNIMONTES</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>SGES</b> UNIMONTES</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Cadastro de Aluno</p>

                <form action="<?php echo base_url('sistema/cadastro'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <label for="cpf">CPF<span class="text-danger">*</span>:</label>
                        <input id="cpf" name="cpf" type="text" maxlength="14" class="form-control" placeholder="CPF" require>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="nome">Nome Completo<span class="text-danger">*</span>:</label>
                        <input id="nome" name="nome" type="text" maxlength="255" class="form-control" placeholder="Nome Completo" require>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="matricula">Matrícula<span class="text-danger">*</span>:</label>
                        <input id="matricula" name="matricula" type="text" maxlength="30" class="form-control" placeholder="Matrícula" require>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="senha">Senha<span class="text-danger">*</span>:</label>
                        <input id="senha" name="senha" type="password" class="form-control" placeholder="Senha de acesso" require>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="email">E-mail<span class="text-danger">*</span>:</label>
                        <input id="email" name="email" type="text" maxlength="255" class="form-control" placeholder="E-mail" require>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <label for="contato">Contato:</label>
                        <input id="contato" name="contato" type="text" maxlength="14" class="form-control" placeholder="Contato">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <?php
                    if ($this->session->flashdata('msg') != NULL) {
                        echo $this->session->flashdata('msg');
                    }
                    ?>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Confirmar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <hr/>
                Obrigatório<span class="text-danger">*</span>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- jQuery mask -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.mask.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script>
            $('#cpf').mask('999.999.999-99');
            $('#contato').mask('(00) 0000-00009');
            $('#contato').blur(function(event) {
                if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
                    $('#contato').mask('(00) 00000-0009');
                } else {
                    $('#contato').mask('(00) 0000-00009');
                }
            });
        </script>
    </body>
</html>
