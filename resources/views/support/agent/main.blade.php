
@extends('layouts.app')
@extends('app')
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
          <div class="chat-with">Comunicaciones con {{ $ticket->delusuario->nombres }}
         @if($msgs['0']['member']['envato_status']==0)
         &nbsp;
         @endif
          </div>
          <div class="chat-num-messages">{{ count($msgs) }} messages 
            @if($status==1)
            &nbsp;  <span style="background:orange; color:white; padding:3px">Closed</span>
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
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/agent/addmsg') }}">
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




<a class="btn btn-warning btn-xs" href="{{ url('agent/ticket/close/'.$msgs[0]['ticket_id'].'') }}" ><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Close Ticket</a>


@endif
</div>



        
      </div> <!-- end chat-message -->
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

<!--
<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >#time, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
     #msg
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
      <span class="message-data-time">#time Today</span>
    </div>
    <div class="message my-message">
      #response
    </div>
  </li>
</script>
-->

@endsection

@section('style')
<style type="text/css">
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>
<link href="{{ asset('/css/jquery.rateyo.css') }}" rel="stylesheet">
@endsection

@section('script')
<!--<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('/js/jquery.rateyo.js') }}"></script>

    <script>

      $(function () {
 
  var $rateYo = $("#rateYo").rateYo();
 
  $("#getRating").click(function () {
 
    /* get rating */
    var rating = $rateYo.rateYo("rating");
    // window.alert("Its " + rating + " Yo!");
window.location.replace("http://localhost/support/public/agent/ticket/close/" + rating + "/<?php echo $msgs[0]['ticket_id'] ?>");
    });
 
  $("#setRating").click(function () {
     /* set rating */
    var rating = getRandomRating();
    $rateYo.rateYo("rating", rating);
  });
});
    </script>

@stop


