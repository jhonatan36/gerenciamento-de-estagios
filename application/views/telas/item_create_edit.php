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
                

                <form action="<?php echo base_url("item/$funcao"); ?>" method="post">
                    <div class="form-group has-feedback">
                        <label>Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php
                        if (isset($item)) {
                            if ($item != NULL) {
                                echo $item->nome;
                            }
                        }
                        ?>">
                    </div>
                    <div class="form-group">
                        <label>Menu</label>
                        <select name="menu" class="form-control">
                            <?php foreach($menus as $menu){ ?>
                            <option value="<?php echo $menu->id; ?>" <?php if(isset($item) && $item->menu == $menu->id){echo 'selected';} ?>><?php echo $menu->nome; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Método</label>
                        <select name="metodo" class="form-control">
                        <?php foreach($metodos as $metodo){ ?>
                            <option value="<?php echo $metodo->id; ?>" <?php if(isset($item) && $item->metodo == $metodo->id){echo 'selected';} ?>><?php echo $metodo->apelido; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="0" <?php if(isset($item) && $item->status == 0){echo 'selected';} ?>>Desativado</option>
                            <option value="1" <?php if(isset($item) && $item->status == 1){echo 'selected';} ?>>Ativo</option>
                        </select>
                    </div>
                    <?php if (isset($item)) { ?>
                        <input type="hidden" name="id" value="<?php
                        if ($item != NULL) {
                            echo $item->id;
                        }
                        ?>"/>
                           <?php } ?>
                    <hr/>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-4 col-xs-offset-8">
                            <button type="submit" class="btn btn-success btn-block btn-flat">Salvar</button>
                            <a href="<?=base_url('item');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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