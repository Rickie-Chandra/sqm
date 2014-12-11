<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Controller extends CI_Controller {
	/*
	It is responsible to load view of home page and list of airport from database.Responsible to load the view of home page and the list of airport from database.
	*/
	public function index(){
		$data['title'] = "Home";
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->model("modeldb");
		$data['result'] = $this->modeldb->getAirport();
		$this->load->view("viewHome", $data);
	}

	/*
	It is responsible to load view of search page and list of possible flight from database according to user’s inputs.
	*/
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
	
	/*
	It is responsible to load view of personal details page, additional cost option from database and store the chosen flight into session.
	*/
	function personalDetails(){
		$this->load->library('session');
		$this->session->set_userdata('departFlight',$_POST["departFlight"]);
		if(isset($_POST["returnFlight"]) || !empty($_POST["returnFlight"])){
			$this->session->set_userdata('returnFlight',$_POST["returnFlight"]);
		}
		$this->load->model("modeldb");
		$data['result'] = $this->modeldb->getAddCost();
		$this->load->view("viewPerDetail",$data);
	}

	/*
	It is responsible to get some information to find un-selected seat, load view of select seat page, store personal details and additional cost (if any) to session.	
	*/	
	function selectSeat(){
		$this->load->model("modeldb");
		$passId = $this->modeldb->getNumRow("passenger")+1;
		echo $passId;
		$newPass = array (
			'passID' => $passId,
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
		$this->load->library('session');
		$this->session->set_userdata($newPass);
		if(isset($_POST["additionalFee"]) || !empty($_POST["additionalFee"])){
			$this->session->set_userdata('additionalFee',$_POST["additionalFee"]);
		}
		
		if(!empty($this->session->userdata('departFlight'))){
		$data['departSelected'] = $this->modeldb->getSelected($this->session->userdata('departFlight'),1);
		$data['departCapacity'] = $this->modeldb->getCapacity($this->session->userdata('departFlight'));
		}
		if(!empty($this->session->userdata('returnFlight'))){
		$data['returnSelected'] = $this->modeldb->getSelected($this->session->userdata('returnFlight'),2);
		$data['returnCapacity'] = $this->modeldb->getCapacity($this->session->userdata('returnFlight'));
		}
		
		$this->load->view("viewSeat",$data);		
	}

	/*
	It is responsible to store the selected seat into session, get some information to for summary and load view of payment page.
	*/
	function payment(){
		$this->load->model("modeldb");
		$this->load->library('session');
			if(isset($_POST["departSeat"]) || !empty($_POST["departSeat"])){
				$this->session->set_userdata('departSeat',$_POST["departSeat"]);
				//$this->modeldb->setSeat($_POST["departSeat"],$this->session->userdata('passID'),1);
			}
			if(isset($_POST["returnSeat"]) || !empty($_POST["returnSeat"])){
				$this->session->set_userdata('returnSeat',$_POST["returnSeat"]);
				//$this->modeldb->setSeat($_POST["returnSeat"],$this->session->userdata('passID'),2);
			}

			if(!empty($this->session->userdata('departFlight'))){
				$data['departSum']=$this->modeldb->getFlightDetail($this->session->userdata('departFlight'));
			}
			if(!empty($this->session->userdata('returnSeat'))){
				$data['returnSum']=$this->modeldb->getFlightDetail($this->session->userdata('returnFlight'));
			}

			if(!empty($this->session->userdata('additionalFee'))){
				$data['additionalFee']=$this->modeldb->getAddFeeDetail($this->session->userdata('additionalFee'));
			}
			
		$this->load->view("viewPayment",$data);	
	}
	
	/*
	It is responsible to store all session’s data into database, create a ticket and destroy the session.
	*/	
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
		//$this->modeldb->setNewPass($temp);

		if(!empty($this->session->userdata('departSeat'))){
				$this->modeldb->setSeat($this->session->userdata('departSeat'),$this->session->userdata('passID'),1);
			}

		if(!empty($this->session->userdata('returnSeat'))){
				$this->modeldb->setSeat($this->session->userdata('returnSeat'),$this->session->userdata('passID'),2);
			}

		$temp = array(
			'cardType'=> $_POST["cardType"],
			'cardNum'=> $_POST["cardNum"],
			'cardHold'=> $_POST["cardHold"],
			'expDate'=> $_POST["expDate"],
			'cwcid'=> $_POST["cwcid"],
			'cardCountry'=> $_POST["cardCountry"]
			);
		//$this->modeldb->setNewPay($temp);
		$transacID = $this->modeldb->getNumRow("transaction")+1;
		$temp = array(
			'bookingID'=> $transacID,
			'bookDate'=> date("Y-m-d"),
			'departID'=> $this->session->userdata('departFlight'),
			'returnID'=> $this->session->userdata('returnFlight'),
			'passID'=> $this->session->userdata('passID'),
			'chargeID'=> $this->session->userdata('additionalFee')
			);
		//$this->modeldb->setNewTransac($temp);
	
	//require_once ("../../assets/lib/fpdf/fpdf.php");
	//$this->load->library('Fpdf');
	include ('fpdf/fpdf.php');


	$this->fpdf->includeFunction();
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont("Arial","B",16);
	$pdf->Cell(0,10,"E-Ticket",0,1,C);

	$pdf->Cell(50,10,"Passenger ID :",1,0);
	$pdf->Cell(50,10,$this->session->userdata('passID'),1,1);

	$pdf->Cell(50,10,"Name :",1,0);
	$pdf->Cell(50,10,$this->session->userdata('name'),1,1);

	$pdf->Cell(50,10,"IC/Passport :",1,0);
	$pdf->Cell(50,10,$this->session->userdata('icPass'),1,1);

	$pdf->SetFont("Times New Roman",14);

	if(!empty($this->session->userdata('departFlight'))){
		$pdf->Cell(50,10,"Departure Flight Number :",1,0);
		$pdf->Cell(50,10,$this->session->userdata('departFlight'),1,1);
		$temp = $this->modeldb->getFlightDetail($this->session->userdata('departFlight'));
		$pdf->Cell(50,10,"From :",1,0);
		$pdf->Cell(50,10,$temp[0]->from,1,0);
		$pdf->Cell(50,10,"To :",1,0);
		$pdf->Cell(50,10,$temp[0]->to,1,1);
		}

	if(!empty($this->session->userdata('returnFlight'))){
		$pdf->Cell(50,10,"Return Flight Number :",1,0);
		$pdf->Cell(50,10,$this->session->userdata('returnFlight'),1,1);
		$temp = $this->modeldb->getFlightDetail($this->session->userdata('returnFlight'));
		$pdf->Cell(50,10,"From :",1,0);
		$pdf->Cell(50,10,$temp[0]->from,1,0);
		$pdf->Cell(50,10,"To :",1,0);
		$pdf->Cell(50,10,$temp[0]->to,1,1);
		}

	$this->session->sess_destroy();
	$pdf->output();

	}
	

	function test(){	
		//$this->load->view("test");	
		echo (date("Y-m-d"));
	}
		
	
}
