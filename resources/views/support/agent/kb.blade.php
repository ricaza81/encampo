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
        <h3>{{ $company }}</h3>
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
          <div class="chat-with">Knowledgebase &nbsp; &nbsp; &nbsp; <a class="btn btn-success btn-xs"  title="New Ticket" href="{{ URL::to('admin/knowledgebase/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Article</a></div>
        </div>
        <i class="fa fa-star"></i>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/knowledgebase/search') }}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-6">
<input type="text" name="user" id="user" placeholder="Search by Title, Description or Product Name" class="form-control" />
</div>
  <button type="submit" class="btn">
<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </button>
</form>
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
           @if(count($kbs) > 0)
            
            @foreach ($kbs as $kb)
              <div class="col-md-4">
              <h3><a href="{{ URL::to('admin/knowledgebase/view/' . $kb->id) }}">{{ $kb->title }}</a> &nbsp; <a class="btn btn-link btn-xs"  title="Edit" href="{{ URL::to('admin/knowledgebase/edit/' . $kb->id) }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>&nbsp;  <a class="btn btn-link btn-xs"  title="Delete" href="{{ URL::to('admin/knowledgebase/delete/' . $kb->id) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></h3>
              <span class="label label-success">{{ $kb->product->product }} </span>
              <p>Published on {{ $kb->date }} </p>
              </div>
              @endforeach
            
       
      
            {!! str_replace('/?', '?', $kbs->appends(Input::except('page'))->render()) !!}
                   @else
                    <p class="text-center"><img src="{{ asset('images/empty.png') }}" ></p>
                    <br />
                       <h3 class="text-center">No Knowledgebase Datas!</h3>
                    @endif

            
      
      </div>
     
      
      
       
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->


@endsection