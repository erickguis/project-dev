@extends('layout')

@section('content')
<div class="container-fluid">
    {!! Breadcrumbs::render('fondo_tramite', $afiliado) !!}
    <div class="row">
        <div class="col-md-12">

                <div class="row"> 
                 
                    <div class="col-md-6">
                        <h2 style="margin-top:-2px;">{!! $afiliado->getTittleName() !!}</h2>
                    </div>

                    <div class="col-md-6 text-right">  

                         <div class="btn-group" style="margin:-6px 1px;" data-toggle="tooltip" data-placement="top" data-original-title="Ventanilla">
                            <a href="" data-target="#myModal-print" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                                &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-file"></span>&nbsp;&nbsp;&nbsp;
                            </a>
                        </div>

                        <a href="" style="margin:-6px 1px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Certificación">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;&nbsp;
                        </a>

                        <a href="" style="margin:-6px 1px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Calificación">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;&nbsp;&nbsp;
                        </a>

                        <div class="btn-group" style="margin:-6px 1px;" class="btn btn-raised btn-success" data-toggle="tooltip" data-placement="top" data-original-title="Dictamen Legal">
                            <a href="" data-target="#myModal-printdictamen" class="btn btn-raised btn-success dropdown-toggle" data-toggle="modal">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-inbox"></span>&nbsp;&nbsp;&nbsp;
                        </a>
                        </div>
                        &nbsp;
                        <a href="{!! url('afiliado/' . $afiliado->id) !!}" style="margin:-6px 1px;"  class="btn btn-raised btn-warning" data-toggle="tooltip" data-placement="top" data-original-title="Volver">
                            &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-share-alt"></span>&nbsp;&nbsp;&nbsp;
                        </a>

                    </div>

                </div>
            
            <div class="row">
                <div class="col-md-6">    

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Modalidad de Retiro</h3>
                                </div>
                                @if($info_moda == 1)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-modalidad"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_moda == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Modalidad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $fondoTramite->modalidad->name !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>

                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-modalidad"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Seleccionar Modalidad">
                                                <img class="circle" src="{!! asset('assets/images/modalidad.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Información de Solicitante</h3>
                                </div>
                                @if($info_soli == 1)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-solicitante"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_soli == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Carnet Identidad
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->ci !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Apellido Paterno
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->pat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;"></br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Zona Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->zona_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Calle Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->calle_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;"></br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Zona Trabajo
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->zona_trab !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Calle Trabajo
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->calle_trab !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>


                                    </div>

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Apellido Materno
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->mat !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Nombre(s)
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->nom !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            
                                            
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;"></br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Núm Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->num_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Teléfono Domicilio
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->tele_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;"></br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Núm Trabajo
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->num_trab !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;border-bottom:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Celular
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $solicitante->celu_domi !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>
                                    
                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-solicitante"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Solicitante">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                     <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Requisitos Presentados</h3>
                                </div>
                                @if($info_requi)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-requisitos"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_requi)

                                    <div class="col-md-12">

                                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de Documento Presentado</th>
                                                    <th>Estado</th>
                                                    <th> Fecha </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($documentos as $item)
                                                    <tr>
                                                        <td>{!! $item->requisito->name !!}</td>
                                                        <td> 
                                                            <div class="row text-center">
                                                                @if($item->est)
                                                                <span class="glyphicon glyphicon-ok"></span>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td> 
                                                            <div class="row text-center">
                                                                @if($item->est)
                                                                    {!! $item->fech_pres !!}
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>

                                    </div>

                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-requisitos"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicionar Requisitos">
                                                <img class="circle" src="{!! asset('assets/images/requisitos.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">  
                                <div class="col-md-11">
                                    <h3 class="panel-title">Dictamen Legal</h3>
                                </div>
                                @if($info_dict == 1)
                                    <div class="col-md-1 text-right" data-toggle="tooltip" data-placement="top" data-original-title="Editar">
                                        <div data-toggle="modal" data-target="#myModal-dictamenlegal"> 
                                            <span class="glyphicon glyphicon-pencil"  aria-hidden="true"></span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="panel-body" style="font-size: 14px">
                            <div class="row" style="margin-bottom:0px;">

                                @if($info_dict == 1)

                                    <div class="col-md-6">

                                        <table class="table" style="width:100%;">
                                            <tr>
                                                <td style="border-top:0;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Cite
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $dictamenlegal->cite !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-top:1px solid #d4e4cd;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            Observación
                                                        </div>
                                                        <div class="col-md-6">
                                                            {!! $dictamenlegal->obs !!}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                @else
                                    <div class="row text-center">
                                        <div data-toggle="modal" data-target="#myModal-dictamenlegal"> 
                                            <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Dictamen Legal">
                                                <img class="circle" src="{!! asset('assets/images/modalidad.png') !!}" width="45px" alt="icon">                                                                          
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</div>


<div id="myModal-modalidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Modalidad de Retiro</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($fondoTramite, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="moda"/>
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                                    {!! Form::label('modalidad', 'MODALIDAD', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::select('modalidad', $list_modalidades, $fondoTramite->modalidad_id, ['class' => 'combobox form-control', 'required' ]) !!}
                                <span class="help-block">Seleccione la Modalidad</span>
                            </div>
                        </div>
                   
                    </div>

                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-solicitante" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Información de Solicitante</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($solicitante, ['method' => 'PATCH', 'route' => ['solicitante.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="titu"/>
                <div class="row">
                    <div class="col-md-4">

                        <div class="form-group">
                          <div class="col-md-9">
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='1' data-bind='checked: typeToShow'>
                                Titutal
                              </label>
                            </div>
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='2' data-bind='checked: typeToShow'>
                                Conyuge
                              </label>
                            </div>
                            <div class="radio radio-primary">
                              <label>
                                <input type="radio" name="type_soli" value='3' data-bind='checked: typeToShow'>
                                Otro
                              </label>
                            </div>
                          </div>
                        </div>

                            <div class="form-group" data-bind='fadeVisible: parenShow'>
                                    {!! Form::label('paren', 'PARENTESCO', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-8">
                                    {!! Form::text('paren', $solicitante->paren, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                    <span class="help-block">Parentesco</span>
                                </div>
                            </div> 
                   
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                                {!! Form::label('ci', 'CARNET IDENTIDAD', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('ci', '',['class'=> 'form-control', 'required', 'data-bind' => 'value: soli_ci']) !!}
                                <span class="help-block">Núm. Carnet de Identidad</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('pat', 'APELLIDO PATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('pat', $solicitante->pat, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_pat']) !!}
                                <span class="help-block">Apellido Paterno</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('zona_domi', 'ZONA DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('zona_domi', $solicitante->zona_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_zona_domi']) !!}
                                <span class="help-block">Zona Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('calle_domi', 'CALLE DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('calle_domi', $solicitante->calle_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_calle_domi']) !!}
                                <span class="help-block">Calle Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('zona_trab', 'ZONA TRABAJO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('zona_trab', $solicitante->zona_trab, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Zona Trabajo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('calle_trab', 'CALLE TRABAJO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('calle_trab', $solicitante->calle_trab, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Calle Trabajo</span>
                            </div>
                        </div> 
                         
                                                   
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                                {!! Form::label('mat', 'APELLIDO MATERNO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('mat', $solicitante->mat, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_mat']) !!}
                                <span class="help-block">Apellido Materno</span>
                            </div>
                        </div>  
                        <div class="form-group">
                                {!! Form::label('nom', 'NOMBRE(S)', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('nom', $solicitante->nom, ['class'=> 'form-control', 'required', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_nom']) !!}
                                <span class="help-block">Nombre(s)</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('num_domi', 'NÚMERO DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('num_domi', $solicitante->num_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_num_domi']) !!}
                                <span class="help-block">Número de Domicilio</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('tele_domi', 'TELÉFONO DOMICILIO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('tele_domi', $solicitante->tele_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()', 'data-bind' => 'value: soli_tele_domi']) !!}
                                <span class="help-block">Teléfono fijo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('num_trab', 'NÚMERO TRABAJO', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('num_trab', $solicitante->num_trab, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Número de Trabajo</span>
                            </div>
                        </div>
                        <div class="form-group">
                                {!! Form::label('celu_domi', 'CELULAR', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-8">
                                {!! Form::text('celu_domi', $solicitante->celu_domi, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Teléfono Celular</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>




<div id="myModal-requisitos" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Requisitos</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($list_requisitos, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="requi"/>
                <div class="row">
                    <div class="col-md-12" data-bind="event: { mouseover: enableDetails, mouseout: disableDetails }">
                        <table class="table table-striped table-hover" style="width:100%;font-size: 14px">
                            <thead>
                                <tr>
                                    <th>Requisitos</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody data-bind="foreach: requisitos">
                                <tr>
                                    <td data-bind='text: requiname'></td>
                                    <td> 
                                        <div class="row text-center">
                                            <div class="form-group">
                                                <div class="checkbox">
                                                  <label><input type="checkbox" data-bind="checked: booleanValue"></label>
                                              </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
 
                <input type="hidden" name="data" data-bind="value: lastSavedJson"/>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-dictamenlegal" class="modal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Dictamen Legal</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($dictamenlegal, ['method' => 'PATCH', 'route' => ['tramite_fondo_retiro.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="dictamen"/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::label('cite', 'CITE', ['class' => 'col-md-6 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('cite', $dictamenlegal->cite, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Cite</span>
                            </div>
                        </div>

                        <div class="form-group">
                                {!! Form::label('obs', 'OBSERVACIÓN', ['class' => 'col-md-6 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('obs', $dictamenlegal->obs, ['class'=> 'form-control', 'onkeyup' => 'this.value=this.value.toUpperCase()']) !!}
                                <span class="help-block">Observación</span>
                            </div>
                        </div>
                   
                    </div>

                </div>

                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('tramite_fondo_retiro/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

<div id="myModal-print" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Ventanilla Fondo de Retiro</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_ventanilla/' . $afiliado->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<div id="myModal-printdictamen" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Dictamen Legal</h4>
            </div>
            <div class="modal-body">
                <iframe src="{!! url('tramite_fondo_retiro_dictamenlegal/' . $afiliado->id) !!}" width="99%" height="1200"></iframe>
            </div>
        </div>
    </div>
</div>

<!-- <div id="myModal-periodo-aportes" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content panel-warning">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Editar Periodos</h4>
            </div>
            <div class="modal-body">

                {!! Form::model($afiliado, ['method' => 'PATCH', 'route' => ['afiliado.update', $afiliado->id], 'class' => 'form-horizontal']) !!}
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                <input type="hidden" name="type" value="periods"/>
                <div class="row">
                    <h5 class="modal-title">Años de Aportes</h5>
                    <div class="row" style="margin-bottom:0px;">                       
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Desde
                                            </div>
                                            <div class="col-md-8">
                                                {!! $afiliado->getFull_fech_ini_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                Hasta
                                            </div>
                                            <div class="col-md-8">
                                                {!! $afiliado->getFull_fech_fin_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <table class="table" style="width:100%;">
                                <tr>
                                    <td style="border-top:0;border-bottom:1px solid #d4e4cd;">
                                        <div class="row">
                                            <div class="col-md-3">
                                                Total
                                            </div>
                                            <div class="col-md-9">
                                                {!! $afiliado->getYearsAndMonths_fech_ini_apor() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <h5 class="modal-title">Años de Servicio</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_serv', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_serv" value="{!! $afiliado->getData_fech_ini_serv() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_serv', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_serv" value="{!! $afiliado->getData_fech_fin_serv() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                
                <div class="row text-center">
                    <div class="form-group">
                        <div class="togglebutton">
                          <label>
                            <input type="checkbox" data-bind="checked: periodoValue"> Modificar Periodo
                          </label>
                      </div>
                    </div>
                </div>

                <div class="row" data-bind='fadeVisible: periodoValue, valueUpdate: "afterkeydown"'>
                    <h5 class="modal-title">Periodo adicional en Caso de Anticipo</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_anti', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_anti" value="{!! $afiliado->getData_fech_ini_anti() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_anti', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_anti" value="{!! $afiliado->getData_fech_fin_anti() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                <div class="row" data-bind='fadeVisible: periodoValue, valueUpdate: "afterkeydown"'>
                    <h5 class="modal-title">Periodo de Reconocimiento de Aportes</h5>
                    <div class="col-md-12">
                        <div class="form-group">                            
                            <div class="input-daterange input-group" id="datepicker">
                                <div class="col-md-6">
                                    {!! Form::label('fech_ini_reco', 'DESDE', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_ini_reco" value="{!! $afiliado->getData_fech_ini_reco() !!}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {!! Form::label('fech_fin_reco', 'HASTA', ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="fech_fin_reco" value="{!! $afiliado->getData_fech_fin_reco() !!}"/>
                                    </div>
                                </div>
                            </div>
                        </div>                                                     
                    </div>
                </div>
                <div class="row text-center">
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{!! url('afiliado/' . $afiliado->id) !!}" data-target="#" class="btn btn-raised btn-warning">Cancelar&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></a>
                            &nbsp;&nbsp;<button type="submit" class="btn btn-raised btn-primary">Actualizar&nbsp;&nbsp;<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div> -->

@endsection

@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $('.combobox').combobox();
        $('[data-toggle="tooltip"]').tooltip();
    });

    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        orientation: "bottom right",
        daysOfWeekDisabled: "0,6",
        autoclose: true
    });

    $('.input-daterange').datepicker({
        format: "mm/yyyy",
        viewMode: "months", 
        minViewMode: "months",
        language: "es",
        orientation: "bottom right",
        autoclose: true
    });


    var titular = {!! $afiliado !!};
    var conyuge = {!! $conyuge !!};
    var solicitante = {!! $solicitante !!};

    var Model = function(requisitos) {
        @if ($info_requi)
            this.requisitos = ko.observableArray(ko.utils.arrayMap(requisitos, function(documento) {
            return { requisito_id: documento.requisito_id, requiname: documento.requisito.name, booleanValue: documento.est };
            }));
        @else
            this.requisitos = ko.observableArray(ko.utils.arrayMap(requisitos, function(documento) {
            return { requisito_id: documento.id, requiname: documento.name, booleanValue: false };
            }));
        @endif

        this.detailsEnabled = ko.observable(false);
        this.enableDetails = function() {
            this.lastSavedJson(JSON.stringify(ko.toJS(this.requisitos), null, 2));
        };
        this.disableDetails = function() {
            this.lastSavedJson(JSON.stringify(ko.toJS(this.requisitos), null, 2));
        };
     
        this.lastSavedJson = ko.observable("");

        this.typeToShow = ko.observable('' + solicitante.soli_type_id);
        this.parenShow = ko.observable(false);
        this.parenShow = ko.pureComputed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '3') return true;

        }, this);

        this.soli_ci = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.ci;
            } 
            if (desiredType == '2'){
                return conyuge.ci;
            } 
            if (desiredType == '3'){
                return solicitante.ci;
            }
        }, this);

        this.soli_pat = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.pat;
            } 
            if (desiredType == '2'){
                return conyuge.pat;
            } 
            if (desiredType == '3'){
                return solicitante.pat;
            }
        }, this);

        this.soli_mat = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.mat;
            } 
            if (desiredType == '2'){
                return conyuge.mat;
            } 
            if (desiredType == '3'){
                return solicitante.mat;
            }
        }, this);

        this.soli_nom = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                var nom2 = titular.nom2 ? titular.nom2 : '';
                return titular.nom +" "+ nom2;
            } 
            if (desiredType == '2'){
                return conyuge.nom;
            } 
            if (desiredType == '3'){
                return solicitante.nom;
            }
        }, this);

        this.soli_zona_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.zona;
            } 
            if (desiredType == '2'){
                return solicitante.zona_domi;
            } 
            if (desiredType == '3'){
                return solicitante.zona_domi;
            }

        }, this);

        this.soli_calle_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.calle;
            } 
            if (desiredType == '2'){
                return solicitante.calle_domi;
            } 
            if (desiredType == '3'){
                return solicitante.calle_domi;
            }
        }, this);

        this.soli_num_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.num_domi;
            } 
            if (desiredType == '2'){
                return solicitante.num_domi;
            } 
            if (desiredType == '3'){
                return solicitante.num_domi;
            }
        }, this);

        this.soli_tele_domi = ko.computed(function() {
            var desiredType = this.typeToShow();
            if (desiredType == '1'){
                return titular.tele;
            } 
            if (desiredType == '2'){
                return solicitante.tele_domi;
            } 
            if (desiredType == '3'){
                return solicitante.tele_domi;
            }
        }, this);
  
        this.periodoValue = ko.observable(titular.fech_ini_reco ? true : false);     
    };

    ko.bindingHandlers.fadeVisible = {
        init: function(element, valueAccessor) {
            var value = valueAccessor();
            $(element).toggle(ko.unwrap(value));
        },
        update: function(element, valueAccessor) {
            var value = valueAccessor();
            ko.unwrap(value) ? $(element).fadeIn() : $(element).fadeOut();
        }
    };
    
    @if ($info_requi)
        ko.applyBindings(new Model({!! $documentos !!}));
    @else
        ko.applyBindings(new Model({!! $requisitos !!}));
    @endif

</script>
@endpush