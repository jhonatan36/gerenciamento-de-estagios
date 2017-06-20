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
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Início Vinculo</th>
                                <th>Termino Vinculo</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>CEP</th>
                                <th>E-mail</th>
                                <th>Contato</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empresas as $linha){?>
                            <tr>
                                <td><?php echo $linha->razao_social;?></td>
                                <td><?php echo $linha->cnpj;?></td>
                                <td><?php echo implode('/', array_reverse(explode('-',$linha->inicio_vinculo)));?></td>
                                <td><?php echo implode('/', array_reverse(explode('-',$linha->final_vinculo)));?></td>
                                <td><?php if($linha->cidade!=NULL){echo $linha->cidade;}else{echo '-';}?></td>
                                <td><?php if($linha->bairro!=NULL){echo $linha->bairro;}else{echo '-';}?></td>
                                <td><?php if($linha->endereco!=NULL){echo $linha->endereco;}else{echo '-';}?></td>
                                <td><?php if($linha->cep!=NULL){echo $linha->cep;}else{echo '-';}?></td>
                                <td><?php echo $linha->email ;?></td>
                                <td><?php echo $linha->contato ;?></td>
                                <td>
                                    <a class="text-success" href="<?php echo base_url("empresa/editar/$linha->idempresa"); ?>" title=""><i class="fa fa-pencil-square-o"></i></a>
                                    <a class="text-danger" href="<?php echo base_url("empresa/excluir/$linha->idempresa"); ?>" title=""><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Razão Social</th>
                                <th>CNPJ</th>
                                <th>Início Vinculo</th>
                                <th>Termino Vinculo</th>
                                <th>Cidade</th>
                                <th>Bairro</th>
                                <th>Rua</th>
                                <th>CEP</th>
                                <th>E-mail</th>
                                <th>Contato</th>
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
                    <a href="<?php echo base_url('empresa/cadastrar'); ?>" class="btn btn-info"><i class="fa fa-plus-square"></i> Novo</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->