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
          <div class="chat-with">Change Password</div>
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
         <form class="form-horizontal" role="form" method="POST" action="{{ url('/customer/passupd') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="form-group">
              <label class="col-md-4 control-label">Old Password*</label>
              <div class="col-md-6">
              <input type="password" class="form-control" name="old_pass" value="">
              </div>
            </div>
  <div class="form-group">
              <label class="col-md-4 control-label">New Password*</label>
              <div class="col-md-6">
              <input type="password" class="form-control" name="pass1" value="">
              </div>
            </div>

  <div class="form-group">
              <label class="col-md-4 control-label">Retype New Password</label>
              <div class="col-md-6">
              <input type="password" class="form-control" name="pass2" value="">
              </div>
            </div>
         

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                  Change Password
                </button>
              </div>
            </div>

          </form>

      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection