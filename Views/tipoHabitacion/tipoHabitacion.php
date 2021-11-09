<?php 
    headerAdmin($data); 
    getModal('modalTipoHabitacion',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-bed"></i> <?= $data['page_tittle'];?></h1>
            <p>Creacion de tipo de Habitaciones</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url();?>tipoHabitacion"><?= $data['page_tag'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h5>Registro de Tipo de Habitación</h5>
                    <button type="button" class="btn btn-danger" onclick="openModal();"><i
                            class="fas fa-plus-circle"></i> Nuevo</button>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <table id="datatableTipoHabitacion" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 65%;">Nombre de tipo de Habitación</th>
                                        <th style="width: 35%;">OP</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
<!-- /.control-sidebar -->
<?php footerAdmin($data); ?>