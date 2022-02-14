@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
  <!-- sidebar-->
  <section class="sidebar">	
    <div class="user-profile">
      <div class="ulogo">
        <a href="{{route('dashboard')}}">
          <!-- logo for regular state and mobile devices -->
          <div class="d-flex align-items-center justify-content-center">					 	
            <img style="padding: 0 25px !important;" src="{{ asset('img/defaults/logo.png') }}" alt="">
          </div>
        </a>
      </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="{{($route == 'dashboard') ? 'active':''}}">
        <a href="{{ url('dashboard')}}">
          <i data-feather="pie-chart"></i>
          <span>Dashboard</span>
        </a>
      </li>
      @can('see-security')
      <li class="treeview">
        <a href="#">
          <i data-feather="shield"></i><span>Seguridad</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Roles
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/rol') ? 'active':'' }}"><a href="{{route('role.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/rol') ? 'active':'' }}"><a href="{{route('role.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li> 
          <li class="treeview">
            <a href="#">Usuarios
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/usuario') ? 'active':'' }}"><a href="{{route('user.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/usuario') ? 'active':'' }}"><a href="{{route('user.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>      
        </ul>
      </li>
      @endcan
      <li class="treeview">
        <a href="#">
          <i data-feather="grid"></i><span>Catalogos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview">
            <a href="#">Sucursales
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/sucursal') ? 'active':'' }}"><a href="{{route('branch.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/sucursal') ? 'active':'' }}"><a href="{{route('branch.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Folios
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/folio') ? 'active':'' }}"><a href="{{route('folio.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/folio') ? 'active':'' }}"><a href="{{route('folio.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Documentos
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/documento') ? 'active':'' }}"><a href="{{route('document.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/documento') ? 'active':'' }}"><a href="{{route('document.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Datos Documentos
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/datosdocumento') ? 'active':'' }}"><a href="{{route('document_data.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/datosdocumento') ? 'active':'' }}"><a href="{{route('document_data.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">Categorias
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ ($prefix == '/categoria') ? 'active':'' }}"><a href="{{route('category.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/categoria') ? 'active':'' }}"><a href="{{route('category.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="clock"></i>
          <span>Horarios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($prefix == '/horarios') ? 'active':'' }}"><a href="{{route('project.index')}}"><i class="ti-more"></i>Consultar</a></li>
          <li class="{{ ($prefix == '/horarios') ? 'active':'' }}"><a href="{{route('project.create')}}"><i class="ti-more"></i>Registrar</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="bookmark"></i>
          <span>Proyectos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($prefix == '/proyecto') ? 'active':'' }}"><a href="{{route('project.index')}}"><i class="ti-more"></i>Consultar</a></li>
          <li class="{{ ($prefix == '/proyecto') ? 'active':'' }}"><a href="{{route('project.create')}}"><i class="ti-more"></i>Registrar</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i data-feather="briefcase"></i>
          <span>Empleados</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($prefix == '/empleado') ? 'active':'' }}"><a href="{{route('employee.index')}}"><i class="ti-more"></i>Consultar</a></li>
          <li class="{{ ($prefix == '/empleado') ? 'active':'' }}"><a href="{{route('employee.create')}}"><i class="ti-more"></i>Registrar</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i data-feather="smile"></i>
          <span>Clientes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($prefix == '/cliente') ? 'active':'' }}"><a href="{{route('customer.index')}}"><i class="ti-more"></i>Consultar</a></li>
          <li class="{{ ($prefix == '/cliente') ? 'active':'' }}"><a href="{{route('customer.create')}}"><i class="ti-more"></i>Registrar</a></li>
        </ul>
      </li>
    </ul>

    <!-------------------- Sales Menu --------------->
    <ul id="sales-menu" class="sidebar-menu" data-widget="tree">  
      <li class="{{($route == 'resume') ? 'active':''}}">
        <a href="#">
          <i data-feather="pie-chart"></i>
          <span>Resumen</span>
        </a>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="file-text"></i>
          <span>Cotización</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ ($prefix == '/cotizacion') ? 'active':'' }}"><a href="{{route('quote.index')}}"><i class="ti-more"></i>Consultar</a></li>
          <li class="{{ ($prefix == '/cotizacion') ? 'active':'' }}"><a href="{{route('quote.create')}}"><i class="ti-more"></i>Registrar</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i data-feather="shopping-bag"></i>
          <span>Orden de Compra</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
              <li class="{{ ($prefix == '/ordendecompra') ? 'active':'' }}"><a href="{{route('purchase_order.preview')}}"><i class="ti-more"></i>Generar</a></li>
              <li class="{{ ($prefix == '/ordendecompra') ? 'active':'' }}"><a href="{{route('purchase_order.index')}}"><i class="ti-more"></i>Consultar</a></li>
              <li class="{{ ($prefix == '/ordendecompra') ? 'active':'' }}"><a href="{{route('purchase_order.create')}}"><i class="ti-more"></i>Registrar</a></li>
            </ul>
      </li>

    </ul>

  </section>
</aside>