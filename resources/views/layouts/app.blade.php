<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PTVENTA-ADMIN</title>
    <link href=" {{ asset('css/datatables.css') }} " rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }} "  rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/datepicker3.css') }} " rel="stylesheet">
    <link href=" {{ asset('css/styles.css') }} " rel="stylesheet">
    
    
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    
  
</head>
<body>
     <?php
        function activarmenu($ulr)
         { return request()->is($ulr) ? 'active':'parent'; }
    ?>    
    @guest
        @yield('login')
    @else
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>PUNTO'D</span> VENTA</a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();" title="Salir" >
                            <em class="fa fa-power-off"></em>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            
            <div class="profile-usertitle ">
                <div class="text-center">
                    <div class="profile-usertitle-name ">Administrador</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        
        <ul class="nav menu">
            <li class="{{ activarmenu('home') }}" ><a href="{{ url('/home') }}"><em class="fa fa-home">&nbsp;</em> Inicio</a></li>
            <li class="parent"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-cubes">&nbsp;</em> Almacen <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-1">
                    <li><a class="{{ activarmenu('productos') }}" href="{{ route('products.index') }}">
                        <span class="fa fa-tags">&nbsp;</span> Articulos
                    </a></li>
                    <li><a class="{{ activarmenu('categorias') }}" href="{{ route('category.index') }}">
                        <span class="fa fa-sitemap">&nbsp;</span> Categoria
                    </a></li>
                </ul>
            </li>
            
           <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-archive ">&nbsp;</em> Compras <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-2">
                    <li><a class="{{ activarmenu('ingresos') }}" href="{{ route('ingres.index') }}">
                        <span class="fa fa-line-chart">&nbsp;</span> Historial ventas
                    </a></li>
                    <li><a class="" href="{{ route('provider.index') }}">
                        <span class="   fa fa-truck">&nbsp;</span> Proveedores
                    </a></li>
                   
                </ul>
            </li>

            <li class="parent "><a data-toggle="collapse" href="#sub-item-3">
                <em class="fa fa-shopping-bag">&nbsp;</em> Ventas <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="fa fa-plus"></em></span>
                </a>
                <ul class="children collapse" id="sub-item-3">
                    <li><a class="" href="{{ route('sales.index') }}">
                        <span class="fa fa-shopping-cart">&nbsp;</span> Venta
                    </a></li>
                    <li><a class="" href="{{ route('client.index') }}">
                        <span class="fa fa-handshake-o">&nbsp;</span> Clientes
                    </a></li>
                   
                </ul>
            </li> <!-- barra lateral  -->
        </ul>
    </div><!--/.sidebar-->
        
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        @yield('content')
    </div>  <!--/.main-->
    @endguest
    <!--<script src=" {{-- asset('js/chart.min.js') --}} "></script>
    <script src=" {{-- asset('js/chart-data.js') --}} "></script>
    <script src=" {{-- asset('js/easypiechart.js') --}} "></script>
    <script src=" {{-- asset('js/easypiechart-data.js') --}} "></script>
    <script src=" {{-- asset('js/bootstrap-datepicker.js') --}} "></script>
    <script src=" {{-- asset('js/custom.js') --}} "></script>-->
    <script src=" {{ asset('js/jquery-1.11.1.min.js') }} " ></script>
    <script src=" {{ asset('js/app.js') }} " ></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    <script src=" {{ asset('js/datatables.js') }} " ></script>
    <script src=" {{ asset('js/functions.js') }} " ></script>
    <script src=" {{ asset('js/proveedor.js') }} " ></script>
    <script src=" {{ asset('js/client.js') }} " ></script>
</body>
</html>