<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Estágios</b> UNIMONTES</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?php echo $this->session->userdata('apelido'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <p>
                                <?php echo $this->session->userdata('apelido') . ' - ' . $this->session->userdata('tipo_usuario'); ?> 

                                <small>Cadastrado em:  <?php echo $this->session->userdata('data_cadastro'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Editar Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('sistema/deslogar'); ?>" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('apelido'); ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVEGAÇÃO</li>
            <?php
            $perfil = $this->session->userdata('perfil');
            $menus = $this->menu->retorna_menus(NULL, 'nome ASC', TRUE);

            if (empty($perfil)) {

                $perfil = 0;
            }

            foreach ($menus as $val) {
                ?>

                <li class="<?php
                if ($this->uri->segment(1) == 'usuario') {
                    echo 'active';
                } else if ($this->uri->segment(1) == 'aluno') {
                    echo 'active';
                }
                ?> 
                    treeview">
                    <a href="#">
                        <i class="fa fa-users"></i> <span><?= $val->nome; ?></span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <?php
                    $itens = $this->item->retorna_itens_menu($perfil, $val->id, 'nome ASC');

                    if ($itens->num_rows() > 0) {

                        $itens = $itens->result();
                        ?>

                        <ul class="treeview-menu">
                            <?php foreach ($itens as $i) { ?>

                                <li class="<?php
                                if ($this->uri->segment(1) == 'usuario') {
                                    echo 'active';
                                }
                                ?>">
                                    <a href="<?php echo base_url($i->apelido); ?>">
                                        <i class="fa fa-user"></i> <?= $i->nome; ?>
                                    </a>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>
                <?php }
            }
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small><?php echo $titulo; ?></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('sistema'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <?php
                $funcao = $this->uri->segment(1);
                if ($funcao != NULL) {
                    echo "<li class='active'><a href=" . base_url($this->uri->segment(1)) . ">$funcao</a></li>";
                }
                ?>
                <?php
                $funcao = $this->uri->segment(2);
                if ($funcao != NULL) {
                    echo "<li class='active'>$funcao</li>";
                }
                ?>
                <?php
                $funcao = $this->uri->segment(3);
                if ($funcao != NULL) {
                    echo "<li class=''>$funcao</li>";
                }
                ?>
        </ol>
    </section>