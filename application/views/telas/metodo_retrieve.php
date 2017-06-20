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
                                <th>Classe</th>
                                <th>Método</th>
                                <th>Descrição</th>
                                <th>Apelido</th>
                                <th>Privado</th>
                                <th>Data de Criação</th>
                                <th>Data de Modificação</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($metodos as $linha){?>
                            <tr>
                                <td><?php echo $linha->nome;?></td>
                                <td><?php echo $linha->classe;?></td>
                                <td><?php echo $linha->metodo; ?></td>
                                <td><?php echo $linha->descricao; ?></td>
                                <td><?php echo $linha->apelido; ?></td>
                                <td><?php echo $linha->privado; ?></td>
                                <td><?php $data = explode(' ', $linha->data_criacao); echo $data = implode('/', array_reverse(explode('-', $data[0]))).' '.$data[1]; ?></td>
                                <td><?php $data = explode(' ', $linha->data_modificacao); echo $data = implode('/', array_reverse(explode('-', $data[0]))).' '.$data[1]; ?></td>
                                <td>
                                    <a class="text-danger" href="javascript:func()" onclick="confirma_exclusao_metodo('<?= $linha->id ?>')"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Classe</th>
                                <th>Método</th>
                                <th>Descrição</th>
                                <th>Apelido</th>
                                <th>Privado</th>
                                <th>Data de Criação</th>
                                <th>Data de Modificação</th>
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

</section>
<!-- /.content -->