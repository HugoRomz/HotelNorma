<?php 
    headerAdmin($data); 
    getModal('modalHabitacion',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> <?= $data['page_tittle'];?></h1>
            <p>Creacion de Habitaciones</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url();?>habitacion"><?= $data['page_tag'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h5>Registro de Habitación</h5>
                    <button type="button" class="btn btn-danger" onclick="openModal();"><i
                            class="fas fa-plus-circle"></i> Nuevo</button>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <table id="datatableHabitacion" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No. Habitacion</th>
                                        <th>Tipo</th>
                                        <th style="width: 10%;">Precio</th>
                                        <th style="width: 10%;">No. Piso</th>
                                        <th>Caracteristica</th>
                                        <th style="width: 10%;">Status</th>
                                        <th style="width: 10%;">OP</th>
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