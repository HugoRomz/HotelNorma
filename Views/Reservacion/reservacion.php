<?php 
    headerAdmin($data); 
    getModal('modalReserva',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-bed"></i> <?= $data['page_title'];?></h1>
            <p>Creacion de Reservaciones</p>
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
                    <h5>Registro de Reserva</h5>
                
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <table id="datatableReservacion" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                       <th>Id. Reserva</th>
                                       <th>No Habitacion</th>
                                       <th>Tipo</th>
                                       <th>Fecha de Entrada</th>
                                       <th>Fecha Salida</th>
                                       <th>Estado</th>
                                       <th>OP</th>
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