<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">

            <?php
            if ($this->session->flashdata('mensagem') != NULL) {
                echo $this->session->flashdata('mensagem');
            }
            ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>

                <form action="<?php echo base_url("naturezaVinculo/$funcao"); ?>" method="post">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label>Nome</label>
                            <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php
                            if (isset($naturezaVinculo)) {
                                if ($naturezaVinculo != NULL) {
                                    echo $naturezaVinculo->nome;
                                }
                            }
                            ?>">
                        </div>
                        <div class="form-group has-feedback">
                            <label>Descrição</label>
                            <textarea name="descricao" class="form-control" placeholder="Descrição" ><?php
                            if (isset($naturezaVinculo)) {
                                if ($naturezaVinculo != NULL) {
                                    echo $naturezaVinculo->descricao;
                                }
                            }
                            ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="0" <?php if(isset($naturezaVinculo) && $naturezaVinculo->status == 0){echo 'selected';} ?>>Desativado</option>
                                <option value="1" <?php if(isset($naturezaVinculo) && $naturezaVinculo->status == 1){echo 'selected';} ?>>Ativo</option>
                            </select>
                        </div>
                        <?php if (isset($naturezaVinculo)) { ?>
                            <input type="hidden" name="id" value="<?php
                            if ($naturezaVinculo != NULL) {
                                echo $naturezaVinculo->idnatureza_vinculo;
                            }
                            ?>"/>
                        <?php } ?>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-1">
                                <a href="<?=base_url('naturezaVinculo');?>" class="btn btn-danger btn-flat" >Cancelar</a>
                            </div>
                            <div class="col-md-1 col-md-offset-10">
                                <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->