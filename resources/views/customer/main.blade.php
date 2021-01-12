
@extends('layouts.app')
@extends('app')
@section('htmlheader_title')

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
          <div class="chat-with">Comunicaciones con {{ $usuario->nombres }}
         @if($msgs['0']['member']['envato_status']==0)
         &nbsp;
         @endif
          </div>
          <div class="chat-num-messages">{{ count($msgs) }} mensaje(s) 
            @if($status==1)
            &nbsp;  <span style="background:orange; color:white; padding:3px">Solucionado</span>
            @endif
            </div>
            
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
          @if(count($msgs) > 0)
          @foreach ($msgs as $msg)
          <?php
          $txt=$txt2="";
          $txt3='other-message';
        //  $name=$msg->member->name;
          if($msg->type==1){
            $txt='align-right';
            $txt2='float-right';
            $txt3='my-message';
            $name='Support Team';
          }
          ?>
          <li class="clearfix">
            <div class="message-data {{ $txt }}">
              <span class="message-data-time" >{{ $msg->dt_time }}</span> &nbsp; &nbsp;
    
              
            </div>
            <div class="message {{ $txt3 }}  {{ $txt2 }}">
              {{ $msg->msg }}
            </div>
          </li>
          @endforeach
          @endif
       
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/addmsg') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="user" value="{{ $msgs[0]['user_id'] }}">
        <input type="hidden" name="ticket" value="{{ $msgs[0]['ticket_id'] }}">
        <textarea name="message" id="message-to-send" placeholder ="Escribe tu mensaje" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Enviar</button>
        
      </form>
        <br /><br/>
        <div class='row'>
         <!-- <div class="col-md-9"><a href="{{ url('admin/ticket/delete/'.$msgs[0]['ticket_id'].'') }}" class="delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete Ticket</a> &nbsp; </div>-->
@if($status!=1)
<div class="col-md-3">

<div id="rateYo" class="float:right;"></div>
<!--<button id="getRating" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Close Ticket</button>-->
</div>

@endif
</div>


@endsection

@section('scripts')
    <style> 
  .content-wrapper{min-height:5000px;}</style>
@endsection