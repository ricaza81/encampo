<?php namespace App\Http\Controllers;

use App\support\Members;
use App\support\Tickets;
use App\Eventos;
use App\support\Message;
use App\support\Knowledgebase;
use App\support\Settings;
use Illuminate\Http\Request;
use App\custom\Curl;
use Auth;
use DB;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\AppServiceProvider;
use App\User;
use Mail;

class SupportController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */

	//dashboard & settings view
	public function index()
	{
		$ticket_count=Tickets::Where('status', '=', '0')->count();
		$tickets=Tickets::Where('status', '=', '0')->limit(5)->get();
		$kb_count=Knowledgebase::count();
		$mem_count=Members::count();
		$prod_count=Products::count();
		$avg_rating=Tickets::avg('rating');

		//chart
		$tickets_chart=Tickets::Select(DB::Raw('DATE(tbl_tickets.open_time) day, count(*) as count, tbl_tickets.open_time'))
		->Groupby('day')
		->limit(5)->Orderby('id', 'DESC')->get();

		$prod_chart=Tickets::Select(DB::Raw('count(*) as count2, tbl_tickets.prod'))
		->Groupby('prod')->get();
		
		
		$avg_time2=Tickets::Select(DB::Raw('SEC_TO_TIME(AVG(UNIX_TIMESTAMP(tbl_tickets.close_time) - UNIX_TIMESTAMP(tbl_tickets.open_time))) as total'))
		->Where('close_time', '!=', '0000-00-00 00:00:00')
		->get();
		$avg_time=$avg_time2[0]['total'];


		return view('agent/home')->with('tickets', $tickets)
		->with('ticket_count',  $ticket_count)
		->with('kb_count',  $kb_count)
		->with('mem_count',  $mem_count)
		->with('prod_count',  $prod_count)
		->with('avg_rating',  $avg_rating)->with('avg_time',  $avg_time)
		->with('tickets_chart',  $tickets_chart)->with('prod_chart',  $prod_chart);
	}

	/*public function ticketview($id){
		$tickets=Tickets::Where('status', '=', '0')->limit(5)->OrderBy('id', 'DESC')->get();
		$ticket=Tickets::find($id);
		$status=$ticket->status;
		$msgs=Message::where('ticket_id', '=', $id)->OrderBy('id', 'ASC')->get();
		return view('agent/main')->with('tickets', $tickets)->with('msgs', $msgs)->with('status', $status);
	}*/


	  public function tickets($param)
  {
    $usuarioactual=\Auth::user();
$fecha=date('Y-m-d');
$idusuario=\Auth::user()->id;
$events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
$events_day=count($events);
 $id=\Auth::user()->id;
    if($param=='open'){
    $status=0;  
    }
    elseif($param=='archived'){
    $status=1;
    }
    else{
    $status=2;    
    }

    $tickets=Tickets::where('user_id','=', $param)/*->where('status', '=', $status)*/->paginate('25');
    return view('customer/tickets')->with("events_day",$events_day)->with("usuario", $usuarioactual)->with('tickets', $tickets);/*->with('status', $param);*/
  }


	public function ticketclose($rating, $id){
		$tickets=Tickets::find($id);
		$tickets->status=1;
		$tickets->rating=$rating;
		$tickets->close_time=date('Y-m-d H:i:s');
		$tickets->save();
		return redirect()->back();
		//return view('agent/main')->with('tickets', $tickets)->with('msgs', $msgs);
	}

	public function ticketdelete($id){
		$tickets=Tickets::find($id);
		$tickets->status=2;
		$tickets->save();
		return redirect()->back();
		//return view('agent/main')->with('tickets', $tickets)->with('msgs', $msgs);
	}



/*	public function tickets($param)
	{

		if($param=='open'){
		$status=0;	
		}
		elseif($param=='archived'){
		$status=1;
		}
		else{
		$status=2;		
		}

		$tickets=Tickets::Where('status', '=', $status)->paginate('25');
		return view('agent/tickets')->with('tickets', $tickets)->with('status', $param);
	}

	public function tickets_search(Request $request)
    {

      $formData = $request->all();
      if($formData['status']=='open'){
		$status=0;	
		}
		elseif($formData['status']=='archived'){
		$status=1;
		}
		
      $tickets = Tickets::join('tbl_users', 'tbl_tickets.user_id', '=', 'tbl_users.id')
      ->Where('tbl_tickets.status', '=', $status)
      ->Where(function($query) use($formData)
            {
                $query->Where('tbl_tickets.title','like','%'.$formData['user'].'%')
                ->OrWhere('tbl_users.name','like','%'.$formData['user'].'%');
             })
      ->select('tbl_tickets.*')
      ->paginate(25);
          
      	return view('agent/tickets')->with('tickets', $tickets)->with('status', $formData['status']);
    }*/

    public function tickets_filter(Request $request)
    {
      $formData = $request->all();
       if($formData['status']=='open'){
		$status=0;	
		}
		elseif($formData['status']=='archived'){
		$status=1;
		}
	//print_r($formData);	
	
	//$from = date('Y-m-d' . ' 00:00:00', strtotime($formData['start'])); 
  	//$to = date('Y-m-d' . ' 23:59:59', strtotime($formData['end'])); 
  	$from = date('Y-m-d', strtotime($formData['start'])); 
  	$to = date('Y-m-d', strtotime($formData['end'])); 
  	
	$tickets = Tickets::whereBetween('open_time',[$from, $to])
	/*Where(function($query) use($formData)
	{
		$query->whereRaw('open_time >= ?', [date('Y-m-d 00:00:00', strtotime($formData['start']))]);
	    ->whereRaw('open_time <= ?', [date('Y-m-d 23:59:59', strtotime($formData['end']))]);
	})
	*/
	   //->whereRaw('open_time BETWEEN [$from] AND [$to]')
	   //->whereRaw('DATE(open_time) >= ?', [date('Y-m-d', strtotime($formData['start']))])
	    //->whereRaw('DATE(open_time) <= ?', [date('Y-m-d', strtotime($formData['end']))])
      
	  ->Where('status', '=', $status)
	  ->paginate(25);
      //print_r($tickets);
      	return view('agent/tickets')->with('tickets', $tickets)->with('status', $formData['status']);
    }

	public function kb()
	{
		$kbs=Knowledgebase::paginate('25');
		return view('agent/kb')->with('kbs', $kbs);
	}

	public function kb_search(Request $request)
    {

      $formData = $request->all();

		
      $kbs = Knowledgebase::join('tbl_products', 'tbl_kb.prod', '=', 'tbl_products.id')
      ->Where(function($query) use($formData)
            {
                $query->Where('tbl_products.product','like','%'.$formData['user'].'%')
                ->OrWhere('tbl_kb.title','like','%'.$formData['user'].'%')
                ->OrWhere('tbl_kb.description','like','%'.$formData['user'].'%');
             })
      ->select('tbl_kb.*')
      ->paginate(25);
          
      	return view('agent/kb')->with('kbs', $kbs);
    }

	public function kb_edit($id)
	{
		$kbs=Knowledgebase::Where('id', '=', $id)->get();
		$products=Products::get();
		return view('agent/kb_edit')->with('kbs', $kbs)->with('products', $products);
	}

	public function kb_view($id)
	{
		$kbs=Knowledgebase::Where('id', '=', $id)->get();
		return view('agent/kb_view')->with('kbs', $kbs);
	}
	public function kb_update(Request $request)
    {
       $data = $request->all();
       $kb=Knowledgebase::find($data['id']);
      	$kb->title=$data['title'];
      	$kb->description=$data['desc'];
      	$kb->prod=$data['prod'];
      	$kb->date=date('Y-m-d');
      	$kb->save();
      	return redirect('admin/knowledgebase')->with('message', 'Updated Successfully');
   }

 	public function ticket_create(){
	
	$usuarioactual=\Auth::user();
	$fecha=date('Y-m-d');
$idusuario=\Auth::user()->id;
$events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
$events_day=count($events);
	return view('customer.ticket_new')
->with("usuario", $usuarioactual)->with("events_day",$events_day);
	;//->with('products', $products)->with('members', $members);
	}

	  public function ticket_save(Request $request)
    {
       $usuarioactual=\Auth::user();
$fecha=date('Y-m-d');
$idusuario=\Auth::user()->id;
$events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
$events_day=count($events);

       $id=\Auth::user()->id;

       $data = $request->all();
        $kb=new Tickets();
        $kb->user_id=\Auth::user()->id;
        $kb->title=$data['title'];
    //    $kb->prod=$data['prod'];
        $kb->open_time=date('Y-m-d H:i:s');
        $kb->status=0;
        $kb->save();

        $msg=new Message();
        $msg->user_id=\Auth::user()->id;
        $msg->ticket_id=$kb['id'];
        $msg->msg=$data['msg'];
        $msg->dt_time=date('Y-m-d H:i:s');
        $msg->type=0;
        $msg->save();

        $mem=User::find($id);
        $to=$mem->email;
     //email
   $subject='Has creado un ticket';
   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
   $headers .= 'From: Agronielsen.com<ricaza81@gmail.com>' . "\r\n";
   $headers .= 'Cc: ricaza81@gmail.com' . "\r\n";
   mail($to,$subject,$data['msg'],$headers);

     return redirect('customer/ticket/view/'.$kb['id'])->with("usuario", $usuarioactual)->with("events_day",$events_day);
   }

    public function ticketview($ticket_id){
    $usuarioactual=\Auth::user();
    $fecha=date('Y-m-d');
$idusuario=\Auth::user()->id;
$events= Eventos::where('idUsuario','=',$idusuario)->where('fecha_inicio','=',$fecha)->get();
$events_day=count($events);
    $id=\Auth::user()->id;
    $tickets=Tickets::Where('user_id','=', $id)->limit(5)->OrderBy('id', 'DESC')->get();
    $ticket=Tickets::find($ticket_id);
    $status=$ticket->status;
    $msgs=Message::where('ticket_id', '=', $ticket_id)->OrderBy('id', 'ASC')->get();
    return view('customer/main')->with("events_day",$events_day)->with("usuario", $usuarioactual)->with('tickets', $tickets)->with('msgs', $msgs)->with('status', $status);
  }

    public function addmsg(Request $request){

 $id=\Auth::user()->id;
    $formData = $request->all();
    //print_r($formData);
    $news1=new Message();
    $news1->user_id=$id;
    $news1->ticket_id=$formData['ticket'];
    $news1->msg=$formData['message'];
    $news1->dt_time=date('Y-m-d H:i:s');
    $news1->type=0;
    $news1->save();
    $tickets=Tickets::find($formData['ticket']);
  $tickets->status=0;
  $tickets->save();
    return redirect('customer/ticket/view/'.$formData['ticket']);
    }


/*	public function ticket_save(Request $request)
    {
       $data = $request->all();
       	$kb=new Tickets();
      	$kb->user_id=$data['member'];
      	$kb->title=$data['title'];
      	$kb->prod=$data['prod'];
      	$kb->open_time=date('Y-m-d H:i:s');
      	$kb->status=0;
      	$kb->envato_status=0;
      	$kb->envato_key=$data['envato_key'];
      	 //envato verification
		$purchase_key = $data['envato_key'];
		$purchase_data = $this->verify_envato_purchase_code( $purchase_key );
			if( isset($purchase_data['verify-purchase']['buyer']) ) {
					/*
				echo 'Valid License Key!Details'; 
			        echo 'Item ID: ' . $purchase_data['verify-purchase']['item_id'] . ' ';
			        echo 'Item Name: ' . $purchase_data['verify-purchase']['item_name'] . ' ';
			        echo 'Buyer: ' . $purchase_data['verify-purchase']['buyer']. ' ';
			        echo 'License: ' . $purchase_data['verify-purchase']['licence'] . ' ';
			        echo 'Created At: ' . $purchase_data['verify-purchase']['created_at'] . ' ';        echo ''; 
			        */
    /*    $kb_envato_status=1;
		}

      	$kb->save();

      	$msg=new Message();
      	$msg->user_id=$data['member'];
      	$msg->ticket_id=$kb['id'];
      	$msg->msg=$data['msg'];
      	$msg->dt_time=date('Y-m-d H:i:s');
      	$msg->type=1;
      	$msg->save();

      	$mem=Members::find($data['member']);
      	$to=$mem->email;
     //email
     $subject='New Ticket Notification';
     $headers = "MIME-Version: 1.0" . "\r\n";
	 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	 $headers .= 'From: <support@company.com>' . "\r\n";
	 //$headers .= 'Cc: myboss@example.com' . "\r\n";
	 mail($to,$subject,$data['msg'],$headers);



     return redirect('admin/ticket/view/'.$kb['id']);
   }*/

   public function kb_create(){
	$products=Products::get();
	return view('agent/kb_new')->with('products', $products);
	}

	public function kb_save(Request $request)
    {
       $data = $request->all();
       $kb=new Knowledgebase();
      	$kb->title=$data['title'];
      	$kb->description=$data['desc'];
      	$kb->prod=$data['prod'];
      	$kb->date=date('Y-m-d');
      	$kb->save();
      	return redirect('admin/knowledgebase')->with('message', 'Created Successfully');
   }

   public function kb_delete($id){
   	Knowledgebase::find($id)->delete();
   	  	return redirect('admin/knowledgebase')->with('message', 'Deleted Successfully');
   }


	public function products()
	{
		$products=Products::paginate('25');
		return view('agent/product')->with('products', $products);
	}
	public function product_edit($id)
	{
		$products=Products::Where('id', '=', $id)->get();
		return view('agent/prod_edit')->with('products', $products);
	}
	public function product_update(Request $request)
    {
       $data = $request->all();
       $kb=Products::find($data['id']);
      	$kb->product=$data['name'];
      	$kb->url=$data['url'];
      	$kb->save();
      	return redirect('admin/products')->with('message', 'Updated Successfully');
   }
   public function product_save(Request $request)
    {
       $data = $request->all();
       $kb=new Products();
      	$kb->product=$data['name'];
      	$kb->url=$data['url'];
      	$kb->save();
      	return redirect('admin/products')->with('message', 'Updated Successfully');
   }

	public function members()
	{
		$members=Members::
		//leftJoin('tbl_tickets', 'tbl_users.id', '=', 'tbl_tickets.user_id')
				//->Select(DB::Raw('COUNT(tbl_tickets.id) as tickets, tbl_users.*'))
				paginate('25');
		
		return view('agent/members')->with('members', $members);
	}

	public function member_edit($id)
	{
		$members=Members::Where('id', '=', $id)->get();
		return view('agent/members_edit')->with('members', $members);
	}
	public function member_update(Request $request)
    {
       $data = $request->all();
       $kb=Members::find($data['id']);
      	$kb->name=$data['name'];
      	$kb->email=$data['email'];
      	$kb->contact=$data['contact'];
     	$kb->save();
      	return redirect('admin/members')->with('message', 'Updated Successfully');
   }

   public function member_save(Request $request)
    {
       $data = $request->all();
       $kb=new Members();
      	$kb->name=$data['name'];
      	$kb->email=$data['email'];
      	$kb->contact=$data['contact'];
      	$kb->pass=$data['pass'];
      	$kb->doj=date('Y-m-d H:m:i');
      	$kb->act=1;
     	$kb->save();
      	return redirect('admin/members')->with('message', 'Created Successfully');
   }

	public function settings()
	{
		$settings=Settings::get();
		return view('agent/settings')->with('settings', $settings);
	}

	public function settings_update(Request $request)
    {
       $formData = $request->all();
    unset($formData["_token"]);

    foreach ($formData as $data=>$value) {
      $affected = DB::table('tbl_settings')->where('setting', '=', $data)->update(array("value" => $value));
    }
   	
       return redirect('admin/settings')->with('message', 'Updated Successfully');
 
    }

function verify_envato_purchase_code($code_to_verify) {
	// Your Username
	$username = 'nkm_swot';
	
	// Set API Key	
	$api_key = 'n1xxdqsj517xdamjywvl0utliymyya9j';
	
	// Open cURL channel
	$ch = curl_init();
	 
	// Set cURL options
	curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $code_to_verify .".json");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

       //Set the user agent
       $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
       curl_setopt($ch, CURLOPT_USERAGENT, $agent);	 
	// Decode returned JSON
	$output = json_decode(curl_exec($ch), true);
	 
	// Close Channel
	curl_close($ch);
	 
	// Return output
	return $output;
}




}

