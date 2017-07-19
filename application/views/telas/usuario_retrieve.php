<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Filtros</h3>
                </div>
                <div class="box-body">
                    
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <?php if (get_msg('msg') != NULL) {
                echo get_msg('msg');
            } ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>E-mail</th>
                                <th>Contato</th>
                                <th>Perfil do Usuário</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $linha){?>
                            <tr>
                                <td><?php echo $linha->matricula ;?></td>
                                <td><?php echo $linha->nome ;?></td>
                                <td><?php echo $linha->sobrenome ;?></td>
                                <td><?php echo $linha->email ;?></td>
                                <td><?php if($linha->contato!=NULL){echo $linha->contato;}else{echo '-';}?></td>
                                <td><?php echo $linha->perfil; ?></td>
                                <td><?php if($linha->status == 1){echo 'Ativo';}else{echo 'Suspenso';} ?></td>
                                <td>
                                    <a class="text-success" href="<?php echo base_url("usuario/editar/$linha->idusuario"); ?>" title=""><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="text-danger" href="<?php echo base_url("usuario/excluir/$linha->idusuario"); ?>" title=""><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Matrícula</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>E-mail</th>
                                <th>Contato</th>
                                <th>Perfil do Usuário</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Ferramentas</h3>
                </div>
                <div class="box-body">
                    <a href="<?php echo base_url('usuario/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->