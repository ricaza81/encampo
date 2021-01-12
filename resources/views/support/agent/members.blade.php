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
          <div class="chat-with">Clientes &nbsp; &nbsp; &nbsp; <a class="btn btn-success btn-xs"  title="New Ticket" href="{{ URL::to('admin/members/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Cliente</a></div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      <div class="chat-history">



        @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

             @if (Session::has('message'))
            <div class="alert alert-success">
              <strong>  {{ Session('message') }} </strong>
                </div>
          @endif
            @if(count($tickets) > 0)
            
        <table class="table table-striped">
          <thead>
            <tr>
            <th>ID</th>
            <th>Date of Join</th>
            <th>Name</th>
            <th>Email</th>
         
            <th></th>          
          </tr>
          </thead>
          <tbody>
          @foreach ($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>
              <td>{{ $ticket->delusuario->created_at }}</td>
              <td>{{ $ticket->delusuario->nombres }}</td>
              <td>{{ $ticket->delusuario->email }}</td>

            </tr>
            @endforeach
            
                    @endif

            
          </tbody>
          
        </table>

      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection