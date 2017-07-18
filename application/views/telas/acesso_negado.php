<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                Acesso negado a esta pagina! <?=(isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER']!=NULL))? '<a href="'.$_SERVER['HTTP_REFERER'].'" class="btn btn-info btn-xs"><i class="fa fa-arrow-circle-left"></i> Voltar!</a>':''?>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->