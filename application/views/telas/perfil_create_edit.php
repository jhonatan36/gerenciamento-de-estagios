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
                

                <form action="<?php echo base_url("perfil/$funcao"); ?>" method="post">
                    <div class="form-group has-feedback">
                        <label>Semestre</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php
                        if (isset($perfil)) {
                            if ($perfil != NULL) {
                                echo $perfil->nome;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="0" <?php if(isset($perfil) && $perfil->status == 0){echo 'selected';} ?>>Desativado</option>
                            <option value="1" <?php if(isset($perfil) && $perfil->status == 1){echo 'selected';} ?>>Ativo</option>
                        </select>
                    </div>
                    <?php if (isset($perfil)) { ?>
                        <input type="hidden" name="id" value="<?php
                        if ($perfil != NULL) {
                            echo $perfil->id;
                        }
                        ?>"/>
                           <?php } ?>
                    <hr/>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
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