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

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $titulo; ?></h3>
                </div>

                <div class="box-body">
                    <h4 class="text-right"><?= 'Para a Natureza de Vínculo: '; ?><b><?=$natureza->nome?></b></h4>
                    <?php foreach ($tipoArquivo as $linha) { ?>

                        <div class="checkbox">
                            <label>
                                <input onchange="alterar_associacao(<?=$natureza->idnatureza_vinculo;?>, <?=$linha->idtipo_arquivo;?>);" 
                                       type="checkbox" 
                                       value="<?= $linha->idtipo_arquivo; ?>" 
                                       <?php if($this->naturezaVinculo->retorna_associacao(array('idnatureza_vinculo'=>$natureza->idnatureza_vinculo, 'idtipo_arquivo'=>$linha->idtipo_arquivo), FALSE)->num_rows()!=0){echo 'checked';} ?>
                                       > <?= $linha->nome; ?>
                            </label>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->