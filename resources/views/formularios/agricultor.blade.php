@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection


@section('main-content')
 
   <div class="row docs-premium-template">

  <div class="col-md-6">

        <div class="box box-primary col-xs-6">
                
                <div class="box-header">
                  <h3 class="box-title">Crear Nuevo Agricultor</h3>
                </div><!-- /.box-header -->
 
                                        <div class="form-group ">
                                                            <a href="form_nuevo_prospecto" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Crear Agricultor</a>
                                        </div>

                                      </div>
                </div>

  <div class="col-md-6">

        <div class="box box-primary col-xs-6">
                
                <div class="box-header">
                  <h3 class="box-title">Ó el agricultor ya existe?</h3>
                </div><!-- /.box-header -->
 
                                        <div class="form-group ">
                                                            <a href="form_nueva_finca_agricultor_nativo" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light">Ya he creado el agricultor</a>
                                        </div>

                                      </div>
                </div>




@endsection

<style>
.btn-info,
.btn-info.disabled {
  background: #1e88e5;
  border: 1px solid #1e88e5;
  -webkit-box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
  box-shadow: 0 2px 2px 0 rgba(66, 165, 245, 0.14), 0 3px 1px -2px rgba(66, 165, 245, 0.2), 0 1px 5px 0 rgba(66, 165, 245, 0.12);
  -webkit-transition: 0.2s ease-in;
  -o-transition: 0.2s ease-in;
  transition: 0.2s ease-in;
  font-size: 26px }
  .btn-info:hover,
  .btn-info.disabled:hover {
    background: #1e88e5;
    border: 1px solid #1e88e5;
    -webkit-box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2);
    box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2); }
  .btn-info.active, .btn-info:focus,
  .btn-info.disabled.active,
  .btn-info.disabled:focus {
    background: #028ee1;
    -webkit-box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2);
    box-shadow: 0 14px 26px -12px rgba(23, 105, 255, 0.42), 0 4px 23px 0 rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(23, 105, 255, 0.2); }
</style>





