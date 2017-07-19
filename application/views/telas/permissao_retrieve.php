<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if (get_msg('msg') != NULL) {
                echo get_msg('msg');
            } ?>
        </div>
    </div>


    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Selecione um Perfil para atribuição.</label>
                            <form id="perfil_permissao" action="<?php echo base_url('permissao'); ?>" method="POST">
                                <div class="form-group">
                                    <select id="controle_perfil" class="form-control" name="perfil">
                                        <option value="">Selecione um perfil</option>
                                        <?php foreach ($perfis as $perfil) { ?>
                                            <option value="<?php echo $perfil->id; ?>" <?php if(isset($perfil_selecionado)){if($perfil_selecionado == $perfil->id){echo 'selected';}} ?>><?php echo $perfil->nome; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if (isset($perfil_selecionado)) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach ($metodos as $index => $metodo) { ?>
                                    <div class="box box-info collapsed-box">
                                        <div class="box-header with-border">
                                            <h3 class="box-title"><?php echo $index; ?></h3>

                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <?php foreach ($metodo as $linha) { ?>
                                                <div class="checkbox">
                                                    <label>
                                                        <input onchange="alterar_permissao(<?php echo $perfil_selecionado; ?>, <?php echo $linha->id; ?>)" type="checkbox" value="<?php echo $linha->id; ?>" <?php if($this->permissao->verifica_permissao($perfil_selecionado, $linha->id)){echo 'checked';} ?>> <?php echo $linha->metodo; ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
    <!--<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ferramentas</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url('permissao/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>-->

</section>
<!-- /.content -->