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

                <form action="<?php echo base_url("item/$funcao"); ?>" method="post">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select name="menu" class="form-control">
                                        <?php foreach($menus as $menu){ ?>
                                        <option value="<?php echo $menu->id; ?>" <?php if(isset($item) && $item->id_menu == $menu->id){echo 'selected';} ?>><?php echo $menu->nome; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Método</label>
                                    <select name="metodo" class="form-control">
                                    <?php foreach($metodos as $metodo){ ?>
                                        <option value="<?php echo $metodo->id; ?>" <?php if(isset($item) && $item->metodo == $metodo->id){echo 'selected';} ?>><?php echo $metodo->apelido; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?php if(isset($item) && $item->status == 1){echo 'selected';} ?>>Ativo</option>
                                        <option value="0" <?php if(isset($item) && $item->status == 0){echo 'selected';} ?>>Inativo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <?php if (isset($item)) { ?>
                            <input type="hidden" name="id" value="<?php
                            if ($item != NULL) {
                                echo $item->id;
                            }
                            ?>"/>
                        <?php } ?>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-1">
                                <a href="<?=base_url('item');?>" class="btn btn-danger btn-block btn-flat" >Cancelar</a>
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