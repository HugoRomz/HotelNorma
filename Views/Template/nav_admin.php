   <!-- Sidebar menu-->
   <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="<?= media();?>/images/AdminLTELogo.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombre']?></p>
          <p class="app-sidebar__user-name"><?=  $_SESSION['userData']['apellido'];   ?></p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      
    </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?=base_url();?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-address-card"></i><span class="app-menu__label">Cliente</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>habitacion"><i class="icon fa fa-circle-o"></i>Cliente</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-bed"></i><span class="app-menu__label">Habitación</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>habitacion"><i class="icon fa fa-circle-o"></i> Habitacion</a></li>
            <li><a class="treeview-item" href="<?=base_url();?>tipoHabitacion"><i class="icon fa fa-circle-o"></i> Tipo de Habitación</a></li>
            
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-concierge-bell"></i><span class="app-menu__label">Punto de Venta</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>rentaHabitacion"><i class="icon fa fa-circle-o"></i> Renta de Habitacion</a></li>            
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-clipboard-list"></i><span class="app-menu__label">Reporte</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>reporteCaja"><i class="icon fa fa-circle-o"></i>Caja</a></li>            
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-server"></i><span class="app-menu__label">Base de Datos</span></span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>respaldo"><i class="icon fa fa-circle-o"></i>Respaldo</a></li>            
            <li><a class="treeview-item" href="<?=base_url();?>vaciarbase"><i class="icon fa fa-circle-o"></i>Vaciar Base de Datos</a></li> 
          </ul>
        </li>
        
        
      </ul>
    </aside>
   