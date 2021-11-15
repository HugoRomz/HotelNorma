<!-- Modal -->
<div class="modal fade" id="modalreserva" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form id="formReservacion">
                        <div class="card-body">
                        <input type="hidden" class="form-control" name="idpago" id="idpago">
                            <div class="form-group">
                                <label>Cliente:</label>
                                <select class="form-control" id="selectCliente" data-live-search="true"
                                    name="selectCliente"></select>
                            </div>
                            <div class="form-group">
                                <label> Numero de dias:</label>
                                <input type="number" class="form-control" name="inputNumeroDias"
                                    id="inputNumeroDias" value="">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Entrada:</label>
                                <input type="date" class="form-control" name="inputFechaEntrada"
                                    id="inputFechaEntrada" value=""disabled>
                            </div>
                            <div class="form-group">
                                <label>Fecha de Salida:</label>
                                <input type="date" class="form-control" name="inputFechaSalida" id="inputFechaSalida">
                            </div>
                            <div class="form-group">
                                <label>Concepto:</label>
                               <Select class="form-control" id="selectConcepto" data-live-search="true"
                                    name="selectConcepto">
                                   <option value="Reserva">Reservacion</option>
                               </Select>
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