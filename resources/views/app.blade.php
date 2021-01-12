<!--http://codepen.io/drehimself/pen/KdXwxR -->
<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>AskMe | Support Ticket System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  


  <link href="{{ asset('/css/jquery.rateyo.css') }}" rel="stylesheet">

  <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Lato:400,700);
*, *:before, *:after {
  box-sizing: border-box;
}


body {
  background: #7CBB5A;
  font: 14px/20px "Lato", Arial, sans-serif;
  padding: 0px 0;
  color:#000000;
}

ul, ol{
  list-style: none;
}


ul.list2 li a {
text-decoration: none;
}
ul.list2 li a:hover {
color:#7CBB5A;
}
.chat {
  width:80%;
  float: left;
  background: #F2F5F8;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
  color: #434651;
}
.chat .chat-header {
  padding: 10px;
  border-bottom: 2px solid white;
}
.chat .chat-header img {
  float: left;
}
.chat .chat-header .chat-about {
  float: left;
  padding-left: 10px;
  margin-top: 6px;
}
.chat .chat-header .chat-with {
  font-weight: bold;
  font-size: 16px;
}
.chat .chat-header .chat-num-messages {
  color: #92959E;
}
.chat .chat-header .fa-star {
  float: right;
  color: #D8DADF;
  font-size: 20px;
  margin-top: 12px;
}
.chat .chat-history {
  padding: 30px 30px 20px;
  border-bottom: 2px solid white;
  overflow-y: scroll;
  min-height: 360px;

}
.chat .chat-history .message-data {
  margin-bottom: 15px;
}
.chat .chat-history .message-data-time {
  color: #a8aab1;
  padding-left: 6px;
}
.chat .chat-history .message {
  color: white;
  padding: 18px 20px;
  line-height: 26px;
  font-size: 16px;
  border-radius: 7px;
  margin-bottom: 30px;
  width: 90%;
  position: relative;
}
.chat .chat-history .message:after {
  bottom: 100%;
  left: 7%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-bottom-color: #86BB71;
  border-width: 10px;
  margin-left: -10px;
}
.chat .chat-history .my-message {
  background: #86BB71;
}
.chat .chat-history .other-message {
  background: #94C2ED;
}
.chat .chat-history .other-message:after {
  border-bottom-color: #94C2ED;
  left: 93%;
}
.chat .chat-message {
  padding: 30px;
  background: #777777;
  margin-top: -100px;
}
.chat .chat-message textarea {
  width: 100%;
  border: none;
  padding: 10px 20px;
  font: 14px/22px "Lato", Arial, sans-serif;
  margin-bottom: 10px;
  border-radius: 5px;
  resize: none;
}
.chat .chat-message .fa-file-o, .chat .chat-message .fa-file-image-o {
  font-size: 16px;
  color: gray;
  cursor: pointer;
}
.chat .chat-message button {
  float: right;
  color: #94C2ED;
  font-size: 16px;
  text-transform: uppercase;
  border: none;
  cursor: pointer;
  font-weight: bold;
  background: #F2F5F8;
}
.chat .chat-message button:hover {
  color: #75b1e8;
}

.online, .offline, .me {
  margin-right: 3px;
  font-size: 10px;
}

.online {
  color: #86BB71;
}

.offline {
  color: #E38968;
}

.me {
  color: #94C2ED;
}

.align-left {
  text-align: left;
}

.align-right {
  text-align: right;
}

.float-right {
  float: right;
}

a.close{
  background: #86BB71;
  color:white;
  padding:8px;
  text-decoration: none;
}

a.delete{
  background: #E9594D;
  color:white;
  padding:8px;
  text-decoration: none;
}


.clearfix:after {
  visibility: hidden;
  display: block;
  font-size: 0;
  content: " ";
  clear: both;
  height: 0;
}
.name a{
  color:white;
  text-decoration: underline;
}
.panel-black .panel-heading{
  color:white;
  font-style: bold;
  font-size: 15px;
}

.panel-black{
background:transparent;
}

a.home{
  color:white;
  font-style: bold;
  font-size: 48px;
}
/*
a.home{
  color:black;
}
*/
.top-header{
  display:none;
}



/* RESPONSIVE style */
@media (max-width: 900px) {
#people-list{
  display:none;
}
/*.container{
  width:100%;
}
*/
.chat{
  width: 100%;
}
.top-header{
  display:block;
}
}

/* Responsive menu */
.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav .icon {
  display: none;
}

.datepicker{
  color:black;
}

@media screen and (max-width: 900px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 900px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }

}


</style>

</body>
</html>
