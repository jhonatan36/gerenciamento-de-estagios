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
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($naturezaVinculo as $linha){?>
                            <tr>
                                <td><?php echo $linha->nome;?></td>
                                <td><?php echo $linha->descricao;?></td>
                                <td><?php if($linha->status==1){echo 'Ativo';}else if($linha->status==0){echo 'Desativado';}?></td>
                                <td>
                                
                                    <div class="btn-group btn-group-sm">
                                        <a title="Editar" class="btn btn-sm btn-warning" href="<?php echo base_url("naturezaVinculo/editar/$linha->idnatureza_vinculo"); ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a title="Associar Arquivos Necessários" class="btn btn-sm btn-info" href="<?php echo base_url("naturezaVinculo/associarArquivo/$linha->idnatureza_vinculo"); ?>"><i class="fa fa-list"></i></a>
                                        <a title="Apagar" class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta Natureza de Vinculo ?');" href="<?php echo base_url("naturezaVinculo/excluir/$linha->idnatureza_vinculo"); ?>"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
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
                    <a href="<?php echo base_url('naturezaVinculo/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->