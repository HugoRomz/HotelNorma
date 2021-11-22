<!-- Modal -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="titleModal" style="color: #fff;">Nuevo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-success">
                    <!-- form start -->
                    <form id="formCliente">
                        <div class="card-body">
                        <input type="hidden" class="form-control" name="idCliente" id="idCliente">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" class="form-control" name="inputNombreCliente"
                                    id="inputNombreCliente" placeholder="Nombre del Cliente">
                            </div>
                            <div class="form-group">
                                <label>Apellido:</label>
                                <input type="text" class="form-control" name="inputApellidoCliente"
                                    id="inputApellidoCliente" placeholder="Apellido del Cliente">
                            </div>
                            <div class="form-group">
                                <label>Direccion:</label>
                                <input type="text" class="form-control" name="inputDireccionCliente" id="inputDireccionCliente"
                                    placeholder="Dirección del Cliente">
                            </div>
                            <div class="form-group">
                                <label>Edad:</label>
                                <input type="number" min="18" class="form-control" name="inputEdadCliente"
                                    id="inputEdadCliente" placeholder="Edad del Cliente">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" id="btnActionForm" class="btn btn-danger"><span
                                    id="btnText">Guardar</span></button>
                            <button type="reset" class="btn btn-outline-dark">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>