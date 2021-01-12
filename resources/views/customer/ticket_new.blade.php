@extends('layouts.app')

@section('htmlheader_title')
  Home
@endsection

@section('proyectos_menu')
  class="treeview active"
@endsection
@section('añadir_proyecto_menu')
  class="active"
@endsection

@section('main-content')





     
    <div class="chat">
      <div class="chat-header clearfix">
        
        
        <div class="chat-about">
          <div class="chat-with">Crear Ticket de Soporte al Cliente <span class="label label-success">Tickets </label></div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      <div class="chat-history">

           <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/ticket/save') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">


  <div class="form-group">
              <label class="col-md-4 control-label">Título*</label>
              <div class="col-md-6">
              <input type="text" class="form-control" name="title" value="" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Mensaje</label>
              <div class="col-md-6">
              <input type="text" class="form-control" name="msg" value="" required>
              </div>
            </div>

          
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                   Enviar
                </button>
              </div>
            </div>

          </form>

      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection