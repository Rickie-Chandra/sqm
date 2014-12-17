<?php

	class modeldb extends CI_Model{
		//It is responsible to create a new data entry in passenger table.
		function setNewPass($newPass){
			$this->db->insert('passenger', $newPass);
		}


		function setSeat($seat, $passID ,$ref){
			if($ref == 2){
			$this->db->query("UPDATE passenger SET returnSeat='$seat' WHERE passID='$passID'");			
			}else{
			$this->db->query("UPDATE passenger SET departSeat='$seat' WHERE passID='$passID'");
			}
			
		}

		//It is responsible to create a new data entry in payment table.
		function setNewPay($newPay){
			$this->db->insert('payment', $newPay);
		}

		//It is responsible to create a new data entry in transaction table.
		function setNewTransac($newTransac){
			$this->db->insert('transaction', $newTransac);
		}

		//It is responsible to delete data entry in passenger, payment and transaction table base on inputted id.
		function cancelTicket($bookingID,$passID,$payID){
			$this->db->delete('transaction', array('bookingID' => $bookingID)); 
			$this->db->delete('passenger', array('passID' => $passID)); 
			$this->db->delete('payment', array('payID' => $payID)); 
		}

		//It is responsible to get data from flight table after filtering that is based on date, from and to.
    	function getFlight($date, $from, $to){
			$query = $this->db->query("SELECT * FROM flight f INNER JOIN route r ON r.From = '$from' AND r.to = '$to' AND 
				r.RouteID = f.RouteID AND f.FlightDate = '$date'");
    		return $query->result(); 
		}

		//It is responsible to get data from airport table.
		function getAirport(){
			$query = $this->db->get("airport");
			return $query->result();
		}

		//It is responsible to get data from charges table base on inputted id.
		function getAddCost(){
			$query = $this->db->get("charges");
			return $query->result();
		}

		//It is responsible to get information regarding capacity of aircraft base on inputted flight id.
		function getCapacity($id){
			$query = $this->db->get_where('flight', array('flightID' => $id));
			$data = $query->result_array();
			if(count($data)<1){return 0;}		
			$query = $this->db->get_where('aircraft', array('craftID' => $data[0]['craftID']));
			$data = $query->result_array();	
			if(count($data)<1){return 0;}
			return $data[0]['capacity'];
		}

		//It is responsible to get information regarding capacity of aircraft base on inputted flight id.
		function getLastID($table,$col){
			$this->db->select($col);
			$this->db->order_by($col,'desc');
			$this->db->from($table);
			$query=$this->db->get();
    		return $query->result(); 
		}

		//It is responsible to get all selected seat base on inputted flight ID
		function getSelected($id){
			$stack = array();

			$query = $this->db->get_where('transaction', array('returnID' => $id));
			$data = $query->result_array();
			if(!count($data)<1){
				for ($i=0; $i<count($data); $i++){
				$query = $this->db->get_where('passenger', array('passID' => $data[$i]['passID']));
				$data2 = $query->result_array();
				array_push($stack,$data2[0]['returnSeat']);
				}
			}

			$query = $this->db->get_where('transaction', array('departID' => $id));
			$data = $query->result_array();
			if(!count($data)<1){
				for ($i=0; $i<count($data); $i++){
				$query = $this->db->get_where('passenger', array('passID' => $data[$i]['passID']));
				$data2 = $query->result_array();
				array_push($stack,$data2[0]['departSeat']);
				}
			}

			if(empty($stack)){
				return 0;
			}else{
				return $stack;
			}
		}

		//It is responsible to get all information from flight table base on inputted flight ID
		function getFlightDetail($id){
			$query = $this->db->query("SELECT * FROM flight f INNER JOIN route r ON f.FlightID = '$id' AND r.RouteID=f.RouteID");
			return $query->result();
		}

		//It is responsible to get all information from charges table base on inputted charge ID
		function getAddFeeDetail($id){
			$query = $this->db->get_where('charges', array('chargeID' => $id));
			return $query->result();
		}

		//It is responsible to get all information from airport table base on inputted port ID
		function getAirportDetail($id){
			$query = $this->db->get_where('airport', array('portID' => $id));
			return $query->result();
		}

		//It is responsible to get all information from charges table base on inputted charge ID
		function getRouteDetail($id){
			$query = $this->db->get_where('route', array('routeID' => $id));
			return $query->result();
		}

		//It is responsible to get all information from transaction table base on inputted transaction ID
		function getTransacDetail($id){
			$query = $this->db->get_where('transaction', array('bookingID' => $id));
			return $query->result();
		}

		//It is responsible to get all information from passenger table base on inputted passenger ID
		function getPassDetail($id){
			$query = $this->db->get_where('passenger', array('passID' => $id));
			return $query->result();
		}

		
	}
?>



