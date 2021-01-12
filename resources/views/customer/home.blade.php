@extends('app')

@section('content')
 <div class="container clearfix">
<div class="top-header">

  <h3>{{ $company }} <small></small></h3>
    
  <div class="topnav" id="myTopnav">
  <a href="#">Support Ticket System</a>
  <a href="{{ URL('customer/home') }}">Dashboard</a>
  <a href="{{ URL('customer/tickets/open') }}">Tickets</a>
  <a href="{{ URL('customer/tickets/archived') }}">Archived</a>
  <a href="{{ URL('customer/knowledgebase') }}">Knowledgebase</a>
  <a href="{{ URL('customer/profile') }}">Change Profile</a>
  <a href="{{ URL('customer/password') }}">Change Password</a>
  <a href="{{ URL('customer/logout') }}">Logout</a>
  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
  </div>
<div class="people-list" id="people-list">
   <div style="margin-left:20px;margin-top:20px">
   <!--<h1>SWOT</h1>
  <h2>Support Ticket</h2>
-->
<img src="{{ asset('images/logo.png') }}" class="img-responsive">
</div>
    <div class="search">
     <!--     <input type="text" placeholder="search" />
        <i class="fa fa-search"></i> -->
        <h5>{{ $company }}</h5>
      </div> 
            

      <ul class="list2">
        <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/home') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a></div>
          </div>
        </li>
        <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/tickets/open') }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Open Tickets</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/tickets/archived') }}"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Archived Tickets</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/knowledgebase') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Knowledge Base</a></div>
          </div>
        </li>
       
        <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/profile') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/password') }}"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Change Password</a></div>
          </div>
        </li>
          <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('customer/logout') }}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></div>
          </div>
        </li>
      </ul>
    </div>
     
    <div class="chat">
      <div class="chat-header clearfix">
        
        
        <div class="chat-about">
          <div class="chat-with">CUSTOMER DASHBOARD</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      <div class="chat-history">
<h2><span class="glyphicon glyphicon-signal" aria-hidden="true"></span> Statistics</h2>
        <div class="panel panel-black">
        
        <div class="panel-body">

               
             
              <div class="col-md-4 ">
                <div class="panel panel-success">
        <div class="panel-heading">Open Tickets</div>
          <div class="panel-body">
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}">{{ $ticket_count }}</a></h1>
        </div>
      </div>
            </div>
             <div class="col-md-4 ">
                <div class="panel panel-info">
        <div class="panel-heading">Closed Tickets</div>
          <div class="panel-body">
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}">{{ $ticket_count2 }}</a></h1>
        </div>
      </div>
            </div>
              <div class="col-md-4 ">
                <div class="panel panel-danger">
        <div class="panel-heading">KB Articles</div>
          <div class="panel-body">
                   <h1 class="text-center"><a href="{{ URL('admin/members') }}">{{ $kb_count }}</a></h1>
        </div>
      </div>
            </div>
                
             
            

            
      </div>
  </div>
        <div class="row">
        <div class="col-md-6">
          <div class='alert alert-info'>
            <h4>Recent Tickets</h4>
            

          </div>
          <p>
          <ul>
            @foreach($tickets as $ticket)     
            @if($ticket->status==0)
              <li>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> &nbsp;<a href="{{ url('ticket/view/'.$ticket->id) }}" class='home'>{{ $ticket->title }} </a>
              </li>
              @else
              <li>
                <span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> &nbsp;{{ $ticket->title }} <span class="label label-primary">Closed</span>
                
              </li>

              @endif
              @endforeach
              <br />
            </ul>
          </p>
        </div>
          <div class="col-md-6">
          <div class='alert alert-success'>
            <h4>Avg Response Time</h4>
          </div>
          <h1 class="text-center">{{ $avg_time }}</h1>
           <div class='alert alert-warning'>
            <h4>Avg Rating</h4>
          </div>
          <br />
          <div id="rateYo234"></div>
                
                <script type="text/javascript">
                $(function () {
                     $("#rateYo234").rateYo({
                         rating: <?php echo $avg_rating; ?>,
                        readOnly: true
                      });
                    });
                  </script>
        </div>

        </div>

      
       

      
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection