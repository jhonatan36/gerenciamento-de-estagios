<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            
            <?php
            if ($this->session->flashdata('mensagem') != NULL) {
                echo $this->session->flashdata('mensagem');
            }
            ?>
            
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
                                <th>Status</th>
                                <th>Menu</th>
                                <th>Método</th>
                                <th>Data Cadastro</th>
                                <th>Data Modificação</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itens as $linha){?>
                            <tr>
                                <td><?php echo $linha->nome;?></td>
                                <td><?php if($linha->status==1){echo 'Ativo';}else if($linha->status==0){echo 'Desativado';}?></td>
                                <td><?php echo $linha->menu;?></td>
                                <td><?php echo $linha->metodo;?></td>
                                <td><?php $data_cadastro = explode(' ',$linha->data_cadastro); echo implode('/', array_reverse(explode('-',$data_cadastro[0]))).' '.$data_cadastro[1];?></td>
                                <td><?php $data_modificacao = explode(' ',$linha->data_modificacao); echo implode('/', array_reverse(explode('-',$data_modificacao[0]))).' '.$data_modificacao[1];?></td>
                                <td>
                                    <a class="text-success" href="<?php echo base_url("item/editar/$linha->id"); ?>" title=""><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="text-danger" onclick="return confirm('Deseja excluir este item ?');" href="<?php echo base_url("item/excluir/$linha->id"); ?>" title=""><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Menu</th>
                                <th>Método</th>
                                <th>Data Cadastro</th>
                                <th>Data Modificação</th>
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
                    <a href="<?php echo base_url('menu/index'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Voltar</a>
                    <a href="<?php echo base_url('item/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->