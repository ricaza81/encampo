
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
          <div class="chat-with">ADMINISTRATOR DASHBOARD</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      <div class="chat-history">

        <div class="panel panel-black">
        
        <div class="panel-body">
                  <div class="col-md-3 ">
                <div class="panel panel-success">
        <div class="panel-heading">Customers
        <br />
             <h1 class="text-center"><a href="{{ URL('admin/members') }}" class='home'>{{ $mem_count }}</a></h1>
          </div>
      </div>
            </div>
              <div class="col-md-3 ">
                <div class="panel panel-info">
        <div class="panel-heading">Products
        <br />  
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}" class='home'>{{ $mem_count }}</a></h1>
        </div>
      </div>
            </div>
              <div class="col-md-3 ">
                <div class="panel panel-warning">
        <div class="panel-heading">Open Tickets
          <br />
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}" class='home'>{{ $ticket_count }}</a></h1>
        </div>
      </div>
            </div>
              <div class="col-md-3 ">
                <div class="panel panel-danger">
        <div class="panel-heading">KnowledgeBase
          <br />
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}" class='home'></a></h1>
        </div>
      </div>
            </div>
                
             
            

            
      </div>
  </div>
  <div class="row">
    <div class="col-md-8">
        <div id="area-example"></div>
    </div>
        <div class="col-md-4">
        <div id="donut-example"></div>
    </div>

  </div>
        <div class="row">
        <div class="col-md-6">
          <div class='alert alert-info'>
            <h4>Top 5 Open Tickets</h4>
          </div>
          
          <p>
          <ul>
            @if(count($tickets)>0)
            @foreach($tickets as $ticket)      
            
              <li>
                <span class="glyphicon glyphicon-play" aria-hidden="true"></span> &nbsp;<a href="{{ URL::to('agent/ticket/view/' . $ticket->id) }}" title="View {{ $ticket->title }}">{{ $ticket->title }}
              </a>
                <!--@if($ticket->status==0)
                <span class="label label-primary">Closed</span>
                @endif -->
              </li>
              <br />
              @endforeach
              @endif
              <br />
            </ul>
          </p>
        </div>
          <div class="col-md-6">
          <div class='alert alert-success'>
            <h4>Avg Response Time</h4>
          </div>
          <h1 class="text-center">{{ $avg_time }}</h1>
        
         <hr />
         <div class='alert alert-warning'>
            <h4>Avg Rating</h4>
          </div>
          <div id="rateYo234"></div>
                

        </div>
        </div>

        </div>

      
       


     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

 @endsection     

