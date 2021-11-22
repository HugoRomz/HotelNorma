<!-- Modal -->
<div class="modal fade" id="modalHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form id="formHabitacion">
                        <div class="card-body">
                        <input type="hidden" class="form-control" name="id" id="id">
                            <div class="form-group">
                                <label>Numero de Habitación:</label>
                                <input type="number" min="1" class="form-control" name="idHabitacion" id="idHabitacion"
                                    placeholder="Numero de Habitación">
                            </div>
                            <div class="form-group">
                                <label>Tipo de Habiacion:</label>
                                <select class="form-control" id="selectTipoHabitacion" data-live-search="true"
                                    name="selectTipoHabitacion"></select>
                            </div>
                            <div class="form-group">
                                <label>Precio:</label>
                                <input type="number" min="1"  class="form-control" name="inputPrecioHabitacion"
                                    id="inputPrecioHabitacion" placeholder="Precio de Habitación">
                            </div>
                            <div class="form-group">
                                <label>Numero de Piso:</label>
                                <input type="number" min="1"  class="form-control" name="inputNumeroPiso" id="inputNumeroPiso"
                                    placeholder="Numero de piso">
                            </div>
                            <div class="form-group">
                                <label>Numero de Personas:</label>
                                <input type="number" min="1" class="form-control" name="inputNumeroPersonas" id="inputNumeroPersonas"
                                    placeholder="Numero de personas">
                            </div>
                            <div class="form-group">
                                <label>Caracteristica:</label>
                                <input type="text" class="form-control" name="inputCaracteristicaHabitacion"
                                    id="inputCaracteristicaHabitacion" placeholder="Caracteristica de la Habitación">
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
