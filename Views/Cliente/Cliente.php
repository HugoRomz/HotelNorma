<?php 
    headerAdmin($data); 
    getModal('modalCliente',$data);
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-bed"></i> <?= $data['page_tittle'];?></h1>
            <p>Creacion de Clientes</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url();?>Cliente"><?= $data['page_tag'];?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h5>Registro de Cliente</h5>
                    <button type="button" class="btn btn-danger" onclick="openModal();"><i
                            class="fas fa-plus-circle"></i> Nuevo</button>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tile">
                            <table id="datatableCliente" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
                                        <th>Edad</th>
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