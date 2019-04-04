<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <?php
            if ($this->session->flashdata('mensagem') != NULL) {
                echo $this->session->flashdata('mensagem');
            }
            ?>

            <div class="register-box-body">
                <p class="login-box-msg"><?php echo $titulo; ?></p>
                

                <form action="<?php echo base_url("semestre/$funcao"); ?>" method="post">
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
                    <div class="form-group has-feedback">
                        <label>Ano</label>
                        <input name="ano" type="number" class="form-control" placeholder="Ano" value="<?php
                        if (isset($semestre)) {
                            if ($semestre != NULL) {
                                echo $semestre->ano;
                            }
                        }
                        ?>">
                    </div>
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
                    <div class="form-group">
                        <label>Status</label>
                        <select name="ativo" class="form-control">
                            <option value="0" <?php if(isset($semestre) && $semestre->ativo == 0){echo 'selected';} ?>>Desativado</option>
                            <option value="1" <?php if(isset($semestre) && $semestre->ativo == 1){echo 'selected';} ?>>Ativo</option>
                        </select>
                    </div>
                    <?php if (isset($semestre)) { ?>
                        <input type="hidden" name="idsemestre_letivo" value="<?php
                        if ($semestre != NULL) {
                            echo $semestre->idsemestre_letivo;
                        }
                        ?>"/>
                           <?php } ?>
                    <hr/>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            <a href="<?=base_url('semestre');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->