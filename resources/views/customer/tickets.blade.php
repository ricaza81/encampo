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
 <div class="container clearfix">

      


     
    <div class="chat">
      <div class="chat-header clearfix">
        
        
        <div class="chat-about">
          <div class="chat-with"><span class="text-capitalize"></span> Tickets &nbsp; &nbsp; &nbsp; <a class="btn btn-success btn-xs"  title="Nuevo ticket" href="{{ URL::to('customer/ticket_new') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Solicitar Soporte</a></div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      <div class="chat-history">
      <!-- <table class="no-border" width="100%">
<tr><td width="40%">

<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/tickets/search') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="col-md-6">
<input type="text" name="user" id="user" placeholder="name or mobile or email or city" class="form-control" />
</div>
  <button type="submit" class="btn">
Go
                </button>
</form>

</td>
<td width="60%">
<strong>Filter by Date:</strong>&nbsp;
<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/tickets/filter') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
              <div class="col-md-4">
                            <div class='input-group date'>
                            <input type='text' class="form-control" name="start" data-provide="datepicker" placeholder="From Date" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span></div>
              </div>
                              <div class="col-md-4">
                            <div class='input-group date'>
                            <input type='text' class="form-control" name="end" data-provide="datepicker" placeholder="End Date" />
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span></div>
                            </div>
  <button type="submit" class="btn">
Go
                </button>

            </div>
</form></td></tr></table> -->


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
            <th>Usuario</th>
          <!--  <th>Product</th>-->
            <th>Tema</th>
            <th>Estado</th>
        <!--     <th>Rating</th>-->
            <th>Ver</th>          
          </tr>
          </thead>
          <tbody>
            @foreach ($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>    
              <td>{{ $ticket->delusuario->nombres }}</td>
              <td>{{ $ticket->title }}</td>
                <td>
                @if($ticket->status==0)
                <span class="label label-success">En Atención</span>
                @elseif($ticket->status==1)
                <span class="label label-primary">Solucionado</span>
                @elseif($ticket->status==2)
                <span class="label label-danger">Eliminado</span>
                @endif
              </td>
         
             <!--  <td><div id="rateYo<?php echo $ticket->id; ?>"></div>
                
                <script type="text/javascript">
                $(function () {
                     $("#rateYo<?php echo $ticket->id; ?>").rateYo({
                         rating: <?php echo $ticket->rating; ?>,
                        readOnly: true
                      });
                    });
                  </script>
               </td>-->
              <td>
                 <a class="btn btn-info btn-xs"  title="View" href="{{ URL::to('customer/ticket/view/' . $ticket->id) }}"><span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>
                <!--<a class="btn btn-info btn-xs"  title="Edit" href="{{ URL::to('admin/ticket/edit/' . $ticket->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                 <a class="btn btn-danger btn-xs"  title="Delete" href="{{ URL::to('admin/ticket/delete/' . $ticket->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a> -->
              </td>
            </tr>
            @endforeach
            {!! str_replace('/?', '?', $tickets->appends(Input::except('page'))->render()) !!}
                    @else
                   
                    <br />
                       <h3 class="text-center">Aún no has solicitado soporte</h3>
                    @endif

            
          </tbody>
          
        </table>

      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection

@section('scripts')
<style> 
  .content-wrapper{min-height:5000px;}
</style>
@stop