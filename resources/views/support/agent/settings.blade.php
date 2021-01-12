@extends('app')

@section('content')
 <div class="container clearfix">
<div class="top-header">

 <h3>{{ $company }} <small></small></h3>
    
  <div class="topnav" id="myTopnav">
  <a href="#">Support Ticket System</a>
  <a href="{{ URL('admin/dashboard') }}">Dashboard</a>
  <a href="{{ URL('admin/tickets/open') }}">Tickets</a>
  <a href="{{ URL('admin/tickets/archived') }}">Archived</a>
  <a href="{{ URL('admin/members') }}">Customers</a>
  <a href="{{ URL('admin/products') }}">Products</a>
  <a href="{{ URL('admin/knowledgebase') }}">Knowledgebase</a>
  <a href="{{ URL('admin/settings') }}">Settings</a>
  <a href="{{ URL('admin/profile') }}">Change Password</a>
  <a href="{{ URL('auth/logout') }}">Logout</a>
  
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
<img src="{{ asset('images/logo.png') }}">
</div>
    <div class="search">
     <!--     <input type="text" placeholder="search" />
        <i class="fa fa-search"></i> -->
        <h3></h3>
      </div> 
            

   <ul class="list2">
        <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/dashboard') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Dashboard</a></div>
          </div>
        </li>
       <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/tickets/open') }}"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span> Open Tickets</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/tickets/archived') }}"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Archived Tickets</a></div>
          </div>
        </li>
          <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/members') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Customers</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/products') }}"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Products</a></div>
          </div>
        </li>
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/knowledgebase') }}"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Knowledge Base</a></div>
          </div>
        </li>     
         <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/settings') }}"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></div>
          </div>
        </li>
        <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('admin/profile') }}"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Change Password</a></div>
          </div>
        </li>
          <li class="clearfix">
          <div class="about">
            <div class="name"><a href="{{ URL('auth/logout') }}"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></div>
          </div>
        </li>
      </ul>
    </div>
     
    <div class="chat">
      <div class="chat-header clearfix">
        
        
        <div class="chat-about">
          <div class="chat-with">Settings</div>
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
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/settingsupd') }}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach ($settings as $setting)
<input type="hidden" name="id" value="{{ $setting->id }}">
  <div class="form-group">
              <label class="col-md-4 control-label">{{ $setting->setting }}</label>
              <div class="col-md-6">
                @if($setting->setting=='email_notification')
                <select class="form-control" name="member" id="member">
                <option value="1" <?php if($setting->value=='1') echo 'selected="selected"'; ?>>ON</option>
                <option value="0" <?php if($setting->value=='0') echo 'selected="selected"'; ?>>OFF</option> 
                </select>
                @else
              <input type="text" class="form-control" name="{{ $setting->setting }}" value="{{ $setting->value }}">
              @endif
              <span id="helpBlock" class="help-block">{{ $setting->desc }} </span>

              </div>
            </div>
@endforeach     
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                   Save 
                </button>
              </div>
            </div>

          </form>

      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection
