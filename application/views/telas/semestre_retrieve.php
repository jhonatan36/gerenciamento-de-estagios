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
                                <th>Semestre</th>
                                <th>Ano</th>
                                <th>Início</th>
                                <th>Término</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($semestres as $linha){?>
                            <tr>
                                <td><?php echo $linha->semestre;?></td>
                                <td><?php echo $linha->ano;?></td>
                                <td><?php echo implode('/', array_reverse(explode('-',$linha->data_inicio)));?></td>
                                <td><?php echo implode('/', array_reverse(explode('-',$linha->data_final)));?></td>
                                <td><?php if($linha->ativo==1){echo 'Ativo';}else if($linha->ativo==0){echo 'Desativado';}?></td>
                                <td>
                                    <a class="text-success" href="<?php echo base_url("semestre/editar/$linha->idsemestre_letivo"); ?>" title=""><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="text-danger" href="<?php echo base_url("semestre/excluir/$linha->idsemestre_letivo"); ?>" title=""><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Semestre</th>
                                <th>Ano</th>
                                <th>Início</th>
                                <th>Término</th>
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
                    <a href="<?php echo base_url('semestre/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->