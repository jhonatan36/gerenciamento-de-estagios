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

                <form action="<?php echo base_url("estagio/$funcao"); ?>" method="post">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Nome</label>
                                    <p><?php echo $this->session->userdata('apelido'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Semestre Letivo</label>
                                    <p><?php echo $semestre->semestre.' - '.$semestre->ano; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Natura do vínculo</label>
                                    <select class="form-control" name="idnatureza_vinculo" id="natureza_vinculo">
                                        <option value="">Escolha uma opção</option>
                                        <?php foreach ( $natureza_vinculos as $natureza_vinculo ) { ?>
                                            <option value="<?= $natureza_vinculo->idnatureza_vinculo ?>"><?= $natureza_vinculo->nome ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Empresa:</label>
                                    <select class="form-control" name="idempresa" id="natureza_vinculo">
                                        <option value="">Escolha uma opção</option>
                                        <?php foreach ( $empresas as $empresa ) { ?>
                                            <option value="<?= $empresa->idempresa ?>"><?= $empresa->nome_fantasia ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Área de atuação</label>
                                    <input type="text" class="form-control" name="area_de_atuacao" placeholder="Área de atuação" />
                                </div>
                            </div>
                        </div>
						<div class="row">				
							<div class="col-md-4">
                                <div class="form-group has-feedback">
                                    <label>Documentos</label>
                                    <input type="file" class="form-control" name="documentos" multiple="multiple" />
                                </div>
                            </div>
						</div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-6">
                                <a href="<?=base_url('usuario');?>" class="btn btn-danger btn-flat" >Cancelar</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success pull-right btn-flat">Iniciar</button>
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