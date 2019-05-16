<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">

            <?php
            if ($this->session->flashdata('msg') != NULL) {
                echo $this->session->flashdata('msg');
            }
            ?>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $titulo; ?></h3>
                </div>
                
                <form action="<?php echo base_url("semestre/$funcao"); ?>" method="post">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label>Semestre</label>
                                    <input name="semestre" type="number" class="form-control" placeholder="Semestre" value="<?php
                                    if (isset($semestre)) {
                                        if ($semestre != NULL) {
                                            echo $semestre->semestre;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label>Ano</label>
                                    <input name="ano" type="number" maxlength="4" min="0" class="form-control" placeholder="Ano" value="<?php
                                    if (isset($semestre)) {
                                        if ($semestre != NULL) {
                                            echo $semestre->ano;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label>Início</label>
                                    <input name="data_inicio" type="date" class="form-control" value="<?php
                                    if (isset($semestre)) {
                                        if ($semestre != NULL) {
                                            echo $semestre->data_inicio;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-feedback">
                                    <label>Fínal</label>
                                    <input name="data_final" type="date" class="form-control" value="<?php
                                    if (isset($semestre)) {
                                        if ($semestre != NULL) {
                                            echo $semestre->data_final;
                                        }
                                    }
                                    ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="ativo" class="form-control">
                                        <option value="1" <?php if(isset($semestre) && $semestre->ativo == 1){echo 'selected';} ?>>Ativo</option>
                                        <option value="0" <?php if(isset($semestre) && $semestre->ativo == 0){echo 'selected';} ?>>Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <?php if (isset($semestre)) { ?>
                            <input type="hidden" name="idsemestre_letivo" value="<?php
                            if ($semestre != NULL) {
                                echo $semestre->idsemestre_letivo;
                            }
                            ?>"/>
                        <?php } ?>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-1">
                                <a href="<?=base_url('semestre');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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