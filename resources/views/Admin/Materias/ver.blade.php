@extends('layouts.app', ['page' => __('Materias'), 'pageSlug' => 'materias'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Materia {{ $materia->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Clave {{ $materia->clave}} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> Creditos {{ $materia->creditos}} </h6>
                            </div>
            
                            <div class="col-md-6">
                                <h6> Horario {{ $materia->carrera->nombre() }} </h6>
                            </div>
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-carreras-tab" data-toggle="tab" href="#tab-carreras" role="tab" aria-controls="tab-carreras" aria-selected="true"><i class="fas fa-chalkboard"></i>Carreras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-carreras-tab" data-toggle="tab" href="#tab-carreras" role="tab" aria-controls="tab-clases" aria-selected="false"><i class="fas fa-users mr-2"></i>carreras</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                     <div class="card-body">
                        @include('alerts.success')
                        

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-carreras" role="tabpanel" aria-labelledby="tab-carreras-tab">
                                @include('components.tablaCarreras', ['carreras' => $materia->carreras])
                            </div>
                            <div class="tab-pane fade" id="tab-carreras" role="tabpanel" aria-labelledby="tab-carreras-tab">
                               <div class="table-responsive">                           
                            <table class="table" id="tabla-carreras" >
                                <thead class=" text-primary" >
                                    <th scope="col">Carrera</th>
                                    <th scope="col">No. Serie</th>
                                </thead>
                                <tbody>
                                    @foreach ($carreras as $carrera)
                                        <tr>
                                            <td>{{ $carrera->nombre }}</td>
                                            <td>{{ $carrera->numero_serie}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                                <div class="card-footer py-4">
                                    
                                </div>
                                
                            </div>
                        </div>
                                                                                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
