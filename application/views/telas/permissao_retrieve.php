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
                            <a href="<?=base_url('perfil')?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Voltar</a>
                            <h1><?=$perfil_selecionado->nome?></h1>
                            <hr/>
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
                                                        <input onchange="alterar_permissao(<?php echo $perfil_selecionado->id; ?>, <?php echo $linha->id; ?>)" type="checkbox" value="<?php echo $linha->id; ?>" <?php if($this->permissao->verifica_permissao($perfil_selecionado->id, $linha->id)){echo 'checked';} ?>> <?php echo $linha->metodo; ?>
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