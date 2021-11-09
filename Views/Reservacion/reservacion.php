<?php 
    headerAdmin($data); 
    //getModal('modalHabitacion',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class=" fas fa-concierge-bell"></i> <?= $data['page_title'];?></h1>
            <p>Registro de Habitaciones reservadas</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url();?>reservacion"><?= $data['page_tag'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h5>Registro de Reservaciones</h5>
                    <button type="button" class="btn btn-danger" onclick="openModal();"><i
                            class="fas fa-plus-circle"></i> Nuevo</button>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <table id="datatableReservacion" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">N° Habitacion</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Fecha de Salida</th>
                                        <th>N° Personas</th>
                                        <th>Id. Cliente</th>
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