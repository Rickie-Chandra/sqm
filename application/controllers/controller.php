<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {
	
	//It is responsible to load view of home page and list of airport from database.Responsible to load the view of home page and the list of airport from database.
	public function index(){
		$data['title'] = "Home";
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->model("modeldb");
		$data['result'] = $this->modeldb->getAirport();
		$this->load->view("viewHome", $data);
	}

	//It is responsible to load view of search page and list of possible flight from database according to user’s inputs.
	function searchFlight(){
		$departDate = $_POST["departDate"];
		$from = $_POST["from"];
		$to = $_POST["to"];
		$this->load->model("modeldb");
		if(!isset($_POST["returnDate"]) || empty($_POST["returnDate"])){
			$data['result'] = $this->modeldb->getFlight($departDate, substr($from, -3), substr($to, -3));
			$this->load->view("viewFlight", $data);
		}else{
			$returnDate = $_POST["returnDate"];
			$data['result'] = $this->modeldb->getFlight($departDate, substr($from, -3), substr($to, -3));
			$data['return'] = $this->modeldb->getFlight($returnDate, substr($to, -3), substr($from, -3));
			if(empty($data['return'])){
				$data['return'] = "0";}
			$this->load->view("viewFlight", $data);
		}
	}
	
	//It is responsible to load view of personal details page, additional cost option from database and store the chosen flight into session.
	function personalDetails(){
		$this->load->library('session');

		if(isset($_POST["departFlight"]) && $_POST["departFlight"] != "FALSE"){
			$this->session->set_userdata('departFlight',$_POST["departFlight"]);
			$data['departFlight'] = $_POST["departFlight"];
		}
		
		if(isset($_POST["returnFlight"]) && $_POST["returnFlight"] != "FALSE"){
			$this->session->set_userdata('returnFlight',$_POST["returnFlight"]);
			$data['returnFlight'] = $_POST["returnFlight"];
		}
		$this->load->model("modeldb");
		$data['result'] = $this->modeldb->getAddCost();
		$this->load->view("viewPerDetail",$data);
	}

	//It is responsible to get some information to find un-selected seat, load view of select seat page, store personal details and additional cost (if any) to session.	
	function selectSeat(){
		$this->load->library('session');
		$this->load->model("modeldb");
		if(!empty($this->modeldb->getLastID("passenger","passID")[0])){
			$passID = $this->modeldb->getLastID("passenger","passID")[0]->passID+1;
		}else{
			$passID = 1;
		}
		$newPass = array (
			'passID' => $passID,
			'name'=> $_POST["name"],
			'DOB'=> $_POST["DOB"],
			'icPass'=> $_POST["icPass"],
			'email'=> $_POST["email"],
			'phone'=> $_POST["phone"],
			'address'=> $_POST["address"],
			'emergencyName'=> $_POST["emergencyName"],
			'emergencyRelation'=> $_POST["emergencyRelation"],
			'emergencyPhone'=> $_POST["emergencyPhone"]
			);
		$this->session->set_userdata($newPass);
		if(isset($_POST["departAddFee"]) || !empty($_POST["departAddFee"])){
			$this->session->set_userdata('departAddFee',$_POST["departAddFee"]);
		}

		if(isset($_POST["returnAddFee"]) || !empty($_POST["returnAddFee"])){
			$this->session->set_userdata('returnAddFee',$_POST["returnAddFee"]);
		}
		
		if(!empty($this->session->userdata('departFlight'))){
		$data['departSelected'] = $this->modeldb->getSelected($this->session->userdata('departFlight'));
		$data['departCapacity'] = $this->modeldb->getCapacity($this->session->userdata('departFlight'));
		}
		if(!empty($this->session->userdata('returnFlight'))){
		$data['returnSelected'] = $this->modeldb->getSelected($this->session->userdata('returnFlight'));
		$data['returnCapacity'] = $this->modeldb->getCapacity($this->session->userdata('returnFlight'));
		}
		
		$this->load->view("viewSeat",$data);		
	}

	//It is responsible to store the selected seat into session, get some information to for summary and load view of payment page.
	function payment(){
		$this->load->model("modeldb");
		$this->load->library('session');
			if(isset($_POST["departSeat"]) && $_POST["departSeat"] != "FALSE"){
				$this->session->set_userdata('departSeat',$_POST["departSeat"]);
			}
			if(isset($_POST["returnSeat"]) && $_POST["returnSeat"] != "FALSE"){
				$this->session->set_userdata('returnSeat',$_POST["returnSeat"]);
			}

			if(!empty($this->session->userdata('departFlight'))){
				$data['departSum']=$this->modeldb->getFlightDetail($this->session->userdata('departFlight'));
			}
			if(!empty($this->session->userdata('returnFlight'))){
				$data['returnSum']=$this->modeldb->getFlightDetail($this->session->userdata('returnFlight'));
			}

			if(!empty($this->session->userdata('departAddFee'))){
				$data['departAddFee']=$this->modeldb->getAddFeeDetail($this->session->userdata('departAddFee'));
			}

			if(!empty($this->session->userdata('returnAddFee'))){
				$data['returnAddFee']=$this->modeldb->getAddFeeDetail($this->session->userdata('returnAddFee'));
			}
			
		$this->load->view("viewPayment",$data);	
	}
	
	//It is responsible to store all session’s data into database and load view of thanks page
	function ticket(){
		$this->load->model("modeldb");
		$this->load->library('session');
		$temp = array (
			'passID' => $this->session->userdata('passID'),
			'name'=> $this->session->userdata('name'),
			'DOB'=> $this->session->userdata('DOB'),
			'icPass'=> $this->session->userdata('icPass'),
			'email'=> $this->session->userdata('email'),
			'phone'=> $this->session->userdata('phone'),
			'address'=> $this->session->userdata('address'),
			'emergencyName'=> $this->session->userdata('emergencyName'),
			'emergencyRelation'=> $this->session->userdata('emergencyRelation'),
			'emergencyPhone'=> $this->session->userdata('emergencyPhone')
			);
		$this->modeldb->setNewPass($temp);

		if(!empty($this->session->userdata('departSeat'))){
				$this->modeldb->setSeat($this->session->userdata('departSeat'),$this->session->userdata('passID'),1);
			}

		if(!empty($this->session->userdata('returnSeat'))){
				$this->modeldb->setSeat($this->session->userdata('returnSeat'),$this->session->userdata('passID'),2);
			}

		if(!empty($this->modeldb->getLastID("transaction","bookingID")[0])){
			$payID = $this->modeldb->getLastID("transaction","bookingID")[0]->bookingID+1;
		}else{
			$payID = 1;
		}

		$temp = array(
			'payID'=>$payID,
			'cardType'=> $_POST["cardType"],
			'cardNum'=> $_POST["cardNum"],
			'cardHold'=> $_POST["cardHold"],
			'expDate'=> $_POST["expDate"],
			'cwcid'=> $_POST["cwcid"],
			'cardCountry'=> $_POST["cardCountry"]
			);
		$this->modeldb->setNewPay($temp);
		if(!empty($this->modeldb->getLastID("transaction","bookingID")[0])){
			$transacID = $this->modeldb->getLastID("transaction","bookingID")[0]->bookingID+1;
		}else{
			$transacID = 1;
		}
		$this->session->set_userdata('transacID',$transacID);
		$temp = array(
			'bookingID'=> $transacID,
			'bookDate'=> date("Y-m-d"),
			'departID'=> $this->session->userdata('departFlight'),
			'returnID'=> $this->session->userdata('returnFlight'),
			'passID'=> $this->session->userdata('passID'),
			'departAddFeeID'=> $this->session->userdata('departAddFee'),
			'returnAddFeeID'=> $this->session->userdata('returnAddFee'),
			'payID'=> $payID
			);
		$this->modeldb->setNewTransac($temp);
		$this->load->view("viewThanks");
	}

	// It is responsible to create a ticket and show ticket in pdf anditionally by the end it will destroy the session
	function showTicket(){
		$this->load->model("modeldb");
		$this->load->library('session');
		include (APPPATH.'libraries/fpdf/fpdf.php');
		$pdf_filename = tempnam(APPPATH."temp", "pdf");
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont("Arial","B",18);
		$pdf->Image(IMG.'logo.png',10,10,-70);
		$pdf->Ln('10');
		$pdf->Cell(0,30,"E-Ticket",0,2,'C');
		$pdf->SetFont("Times","",12);
		$pdf->Cell(50,10,"Name :",1,0);
		$pdf->Cell(120,10,$this->session->userdata('name'),1,1);
		$pdf->Cell(50,10,"IC/Passport :",1,0);
		$pdf->Cell(120,10,$this->session->userdata('icPass'),1,1);
		$pdf->Cell(50,10,"Booking ID :",1,0);
		$pdf->Cell(120,10,$this->session->userdata('transacID'),1,1);
		$pdf->Cell(50,10,"Passenger ID :",1,0);
		$pdf->Cell(120,10,$this->session->userdata('passID'),1,1);
		if(!empty($this->session->userdata('departFlight'))){
			$pdf->Cell(50,10,"Departure Flight ID :",1,0);
			$pdf->Cell(120,10,$this->session->userdata('departFlight'),1,1);
		}
		if(!empty($this->session->userdata('returnFlight'))){
			$pdf->Cell(50,10,"Return Flight ID :",1,0);
			$pdf->Cell(120,10,$this->session->userdata('returnFlight'),1,1);
		}
		
		$pdf->SetFont("Times","",12);
		if(!empty($this->session->userdata('departFlight'))){
			$pdf->Ln('10');
			$flight = $this->modeldb->getFlightDetail($this->session->userdata('departFlight'));
			$pdf->Cell(0,10,"Departure Flight - ".$flight[0]->flightDate,0,1,'C');
			$pdf->Cell(50,10,"AIRCRAFT NUMBER",1,0);
			$pdf->Cell(50,10,"TIME",1,0);
			$pdf->Cell(70,10,"LOCATION",1,1);
			$pdf->Cell(50,10,$flight[0]->craftID,1,0);
			$pdf->Cell(50,10,$flight[0]->departTime,1,0);
			$route = $this->modeldb->getRouteDetail($flight[0]->routeID);
			$airport = $this->modeldb->getAirportDetail($route[0]->from);
			$pdf->Cell(70,10,$airport[0]->name." - ".$airport[0]->country,1,1);
			$pdf->Cell(50,10,"Seat: ".$this->session->userdata('departSeat'),1,0);
			$pdf->Cell(50,10,$flight[0]->arriveTime,1,0);
			$airport = $this->modeldb->getAirportDetail($route[0]->to);
			$pdf->Cell(70,10,$airport[0]->name." - ".$airport[0]->country,1,1);
			if(!empty($this->session->userdata('departAddFee'))){
				$pdf->Ln('5');
				$pdf->Cell(170,10,"Add on: ".$this->modeldb->getAddFeeDetail($this->session->userdata('departAddFee'))[0]->description,1,1);
			}
		}

		if(!empty($this->session->userdata('returnFlight'))){
			$pdf->Ln('10');
			$pdf->Cell(0,10,"Return Flight - ".$flight[0]->flightDate,0,1,'C');
			$pdf->Cell(50,10,"AIRCRAFT NUMBER",1,0);
			$pdf->Cell(50,10,"TIME",1,0);
			$pdf->Cell(70,10,"LOCATION",1,1);
			$flight = $this->modeldb->getFlightDetail($this->session->userdata('returnFlight'));
			$pdf->Cell(50,10,$flight[0]->craftID,1,0);
			$pdf->Cell(50,10,$flight[0]->departTime,1,0);
			$route = $this->modeldb->getRouteDetail($flight[0]->routeID);
			$airport = $this->modeldb->getAirportDetail($route[0]->from);
			$pdf->Cell(70,10,$airport[0]->name." - ".$airport[0]->country,1,1);
			$pdf->Cell(50,10,"Seat: ".$this->session->userdata('returnSeat'),1,0);
			$pdf->Cell(50,10,$flight[0]->arriveTime,1,0);
			$airport = $this->modeldb->getAirportDetail($route[0]->to);
			$pdf->Cell(70,10,$airport[0]->name." - ".$airport[0]->country,1,1);
			if(!empty($this->session->userdata('returnAddFee'))){
				$pdf->Ln('5');
				$pdf->Cell(170,10,"Add on: ".$this->modeldb->getAddFeeDetail($this->session->userdata('returnAddFee'))[0]->description,1,1);
			}
		}
		$pdf->output();
		$this->session->sess_destroy();
	}

	// It is responsible to show summary in manage booking and load view page of manage booking
	function retrieve(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->model("modeldb");
		$data['transac']=$this->modeldb->getTransacDetail($_POST['bookingID']);
		if(!empty($data['transac'])){
			$data['departSum']=$this->modeldb->getFlightDetail($data['transac'][0]->departID);
			$data['returnSum']=$this->modeldb->getFlightDetail($data['transac'][0]->returnID);
			$data['departAddFee']=$this->modeldb->getAddFeeDetail($data['transac'][0]->departAddFeeID);
			$data['returnAddFee']=$this->modeldb->getAddFeeDetail($data['transac'][0]->returnAddFeeID);
			$data['passName']=$this->modeldb->getPassDetail($data['transac'][0]->passID)[0]->name;
			$data['bookingID']=$_POST['bookingID'];
			$this->load->view("viewRetrieve",$data);
		}else{
		header("refresh:1;url=".URL);
		echo '<script language="javascript">';
		echo 'alert("Wrong Booking ID")';	
		echo '</script>';
		}
		
	}

	// It is responsible for cancel function in manage booking
	function cancel(){
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->model("modeldb");
		if(strlen($_POST["icPass"])>1){
			$data['transac']=$this->modeldb->getTransacDetail($_POST['bookingID']);
			if($this->modeldb->getPassDetail($data['transac'][0]->passID)[0]->icPass==$_POST["icPass"]){
				$this->modeldb->cancelTicket($_POST['bookingID'], $data['transac'][0]->passID, $data['transac'][0]->payID);
			header("refresh:1;url=".URL);
			echo '<script language="javascript">';
			echo 'alert("Cancelation Success")';	
			echo '</script>';
			}
			else{
			header("refresh:1;url=".URL);
			echo '<script language="javascript">';
			echo 'alert("Wrong IC/Passport Number")';	
			echo '</script>';
			}

		}else{
			header("refresh:1;url=".URL);
			echo '<script language="javascript">';
			echo 'alert("IC/Passport Number is too short")';	
			echo '</script>';

		}
	}

	function test(){
		$this->load->view("datepicker");
		//datepicker.html
	}


}
