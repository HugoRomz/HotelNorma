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
          <p><b>500</b> - Registrados</p>
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
     <a style="text-decoration:none" href="<?=base_url();?>rentaHabitacion">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-concierge-bell fa-3x"></i>
        <div class="info">
          <h4>Estadia</h4>
          <p><b id="numeroEstadia"></b> - Ocupadas</p>
        </div>
      </div>
     </a>
    </div>
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="<?=base_url();?>reporteCaja">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-clipboard-list fa-3x"></i>
        <div class="info">
          <h4>Reportes</h4>
          <p><b>500</b></p>
        </div>
      </div>
    </a>
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
    <div class="col-md-6 col-lg-4">
     <a style="text-decoration:none" href="#">
      <div class="widget-small primary coloured-icon"><i class="icon fas fa-cogs fa-3x"></i>
        <div class="info">
          <h4>Configuracion</h4>
          <p><b><br></b></p>
        </div>
      </div>
     </a>
    </div>
    
   
  </div>
</div>

  </div>

</main>
<!-- /.control-sidebar -->
<?php footerAdmin($data); ?>