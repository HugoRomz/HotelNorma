<?php headerAdmin($data); ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Hotel Norma</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url();?>"><?= $data['page_tag'];?></a></li>
    </ul>
  </div>
  <div class="row">
    <!-- <div class="col-md-6 col-lg-4">
      <a style="text-decoration:none" href="#">
        <div class="widget-small primary coloured-icon"><i class="icon fas fa-users fa-3x"></i>
          <div class="info">
            <h4>Usuarios</h4>
            <p><b id="idusuarios">2</b></p>
          </div>
        </div>
      </a>
    </div> -->
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>habitacion">
      <div class="widget-small primary coloured-icon"><i class="icon  fas fa-address-card fa-3x"></i>
        <div class="info">
          <h4>Clientes</h4>
          <p><b id="numeroClientes"></b> - Registrados</p>
        </div>
      </div>
    </a>
    </div>
   
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>habitacion">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-bed fa-3x"></i>
        <div class="info">
          <h4>Habitacion</h4>
          <p><b id="numeroHabitaciones"></b> - Disponibles</p>
        </div>
      </div>

    </a>
    </div>
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>reservacion">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-concierge-bell fa-3x"></i>
        <div class="info">
          <h4>Estadia</h4>
          <p><b id="numeroEstadia"></b> - Ocupadas</p>
        </div>
      </div>
     </a>
    </div>
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>reportes">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-clipboard-list fa-3x"></i>
        <div class="info">
          <h4>Reportes</h4>
          <p><b id="numeroReportes"></b> - Guardados</p>
        </div>
      </div>
    </a>
    </div> 
    <div class="col-md-6 col-lg-4">
     
    </div>
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>respaldo">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-server fa-3x"></i>
        <div class="info">
          <h4>Respaldo</h4>
          <p><b><br></b></p>
        </div>
      </div>
     </a>
    </div>
    <div class="col-md-12">
					<div class="content w-100">
				    <div class="calendar-container">
				      <div class="calendar"> 
              <h2>Calendario</h2>
				        <div class="year-header"> 
				          <span class="left-button fa fa-chevron-left" id="prev"> </span> 
				          <span class="year" id="label"></span> 
				          <span class="right-button fa fa-chevron-right" id="next"> </span>
				        </div> 
				        <table class="months-table w-100"> 
				          <tbody>
				            <tr class="months-row">
				              <td class="month">Ene</td> 
				              <td class="month">Feb</td> 
				              <td class="month">Mar</td> 
				              <td class="month">Abr</td> 
				              <td class="month">May</td> 
				              <td class="month">Jun</td> 
				              <td class="month">Jul</td>
				              <td class="month">Ago</td> 
				              <td class="month">Sep</td> 
				              <td class="month">Oct</td>          
				              <td class="month">Nov</td>
				              <td class="month">Dic</td>
				            </tr>
				          </tbody>
				        </table> 
				        
				        <table class="days-table w-100"> 
				          <td class="day">Lun</td> 
				          <td class="day">Mar</td> 
				          <td class="day">Mier</td> 
				          <td class="day">Jue</td> 
				          <td class="day">Vier</td> 
				          <td class="day">Sab</td> 
				          <td class="day">Dom</td>
				        </table> 
				        <div class="frame"> 
				          <table class="dates-table w-100"> 
			              <tbody class="tbody">             
			              </tbody> 
				          </table>
				        </div> 
				        <button class="button" id="add-button">Agregar</button>
				      </div>
				    </div>
				    <div class="events-container">
				    </div>
				    <div class="dialog" id="dialog">
				        <h2 class="dialog-header"> Agregar Evento </h2>
				        <form class="form" id="form">
				          <div class="form-container" align="center">
				            <label class="form-label" id="valueFromMyButton" for="name">Nombre</label>
				            <input class="input" type="text" id="name" maxlength="36">
				            <label class="form-label" id="valueFromMyButton" for="count">Numero de Gente invitada</label>
				            <input class="input" type="number" id="count" min="0" max="1000000" maxlength="7">
				            <input type="button" value="Cancel" class="button" id="cancel-button">
				            <input type="button" value="OK" class="button button-white" id="ok-button">
				          </div>
				        </form>
				      </div>
				  </div>
				</div>
   
  </div>
  
	
</div>

  </div>

</main>
<!-- /.control-sidebar -->
<?php footerAdmin($data); ?>