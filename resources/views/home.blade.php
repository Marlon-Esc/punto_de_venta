@extends('layouts.app')

@section('content')
   
        <div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Inicio</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inicio</h1>
            </div>
        </div><!--/.row-->
        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-sticky-note color-blue"></em>
                            <div class="large">{{ count($ventas) }}</div>
                            <div class="text-muted">Total ventas</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-red"></em>
                            <div class="large">{{ count($productos) }}</div>
                            <div class="text-muted">Productos</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding"><em class="fa fa-xl fa-users color-orange"></em>
                            <div class="large">{{ count($clientes) }}</div>
                            <div class="text-muted">Clientes</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-red panel-widget ">
                        <div class="row no-padding"><em class="fa fa-xl fa-money color-teal"></em>
                            <div class="large">$ {{ $ganacias }}</div>
                            <div class="text-muted">Ganacias</div>
                        </div>
                    </div>
                </div>
            </div><!--/.row--> <!-- ITEM'S INCIO -->
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default chat">
                    
                    
                   
                </div>
            </div><!--/.col-->
            
            
            <div class="col-md-6">
                <div class="panel panel-default ">
                   
                    
                </div>
            </div><!--/.col-->       
        </div><!--/.row-->

@endsection
