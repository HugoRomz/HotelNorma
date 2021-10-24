
<!-- Modal -->
<div class="modal fade" id="modalTipoHabitacion" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form id="formTipoHabitacion">
                        <input type="hidden" id="idTipoHabitacion" name="idTipoHabitacion">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nombre de Tipo de Habitación:</label>
                                <input type="text" class="form-control" name="inputTipoHabitacion"
                                    id="inputTipoHabitacion" placeholder="Nombre del Tipo de Habitación">
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