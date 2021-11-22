<!-- Modal -->
<div class="modal fade" id="modalTicket" name="modalTicket" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
           
            <div class="modal-body" id="Impresion">
                <div class="card card-success">
                    <!-- form start -->
                    <center>
                  <h3>Hotel Norma</h3>
                  <h5>Ticket</h5>

                    Hotel Norma
                    <br>
                    Ciudad: Tapachula  <br>
                    RUC: *  
                    <br>
                    ----------------------------
                    <br>
                    HOSPEDAJE
                    <br>
                    ----------------------------
                    <br>
                    codigo de pago:    <b id="idpago" name="idpago"></b>  
                    <br>
                    Id_cliente:       <b id="idCliente"> </b> 
                    <br>
                    cliente:          <b id="nombre"></b>
                    <br>
                    <!-- Fecha ingreso:    <a id="fecha_ingreso"></a>    
                    <br> -->
                    Fecha salida:      <b id="fecha_salida"></b>   
                    <br>
                    <!-- Precio:           <a id="precio"></a>     
                    <br> -->
                    Dias hospedaje:   "<b id="dias"></b>        "
                    <br>
                    ----------------------------
                    <br>
                    Total hospedaje: $<b id="total"></b> 
                    <br>
                    ----------------------------
                    <br>
                    Gracias por su preferencia
                    <br>
                    Regrese pronto
                    </center>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="bnt btn-dark" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">Cerrar</span>
                </button>
                <center>
                <input type="button" class="btn btn-danger" onclick="printDiv('Impresion')" value="Imprimir" />
                
                </center>
            </div>
        </div>
    </div>
</div>