<?php

	class modeldb extends CI_Model{

    	function getFlight($date, $from, $to){
			$query = $this->db->query("SELECT * FROM flight f INNER JOIN route r ON r.From = '$from' AND r.to = '$to' AND 
				r.RouteID = f.RouteID AND f.FlightDate = '$date'");
    		return $query->result(); 
		}

		function getAirport(){
			$query = $this->db->get("airport");
			return $query->result();
		}
		
		function getAddCost(){
			$query = $this->db->get("charges");
			return $query->result();
		}
		
		function getCapacity($id){
			$query = $this->db->get_where('flight', array('flightID' => $id));
			$data = $query->result_array();
			if(count($data)<1){return 0;}		
			$query = $this->db->get_where('aircraft', array('craftID' => $data[0]['craftID']));
			$data = $query->result_array();	
			if(count($data)<1){return 0;}
			return $data[0]['capacity'];
		}
		
		function getLastID($table,$col){
			$this->db->select($col);
			$this->db->order_by($col,'desc');
			$this->db->from($table);
			$query=$this->db->get();
    		return $query->result(); 
		}
		
		function setNewPass($newPass){
			$this->db->insert('passenger', $newPass);
		}
		
		function getSelected($id, $ref){
			$stack = array();
			if($ref==2){
				$col='return';
			}else{
				$col='depart';
			}
			$query = $this->db->get_where('transaction', array($col.'ID' => $id));
			$data = $query->result_array();
			if(count($data)<1){
				return 0;
			}else{
				for ($i=0; $i<count($data); $i++){
				$query = $this->db->get_where('passenger', array('passID' => $data[$i]['passID']));
				$data2 = $query->result_array();
				array_push($stack,$data2[0][$col.'Seat']);
				}
			return $stack;
			}
		}
		
		function setSeat($seat, $passID ,$ref){
			if($ref == 2){
			$this->db->query("UPDATE passenger SET returnSeat='$seat' WHERE passID='$passID'");			
			}else{
			$this->db->query("UPDATE passenger SET departSeat='$seat' WHERE passID='$passID'");
			}
			
		}

		function getFlightDetail($id){
			$query = $this->db->query("SELECT * FROM flight f INNER JOIN route r ON f.FlightID = '$id' AND r.RouteID=f.RouteID");
			return $query->result();
		}

		function getAddFeeDetail($id){
			$query = $this->db->get_where('charges', array('chargeID' => $id));
			return $query->result();
		}

		function getAirportDetail($id){
			$query = $this->db->get_where('airport', array('portID' => $id));
			return $query->result();
		}

		function getRouteDetail($id){
			$query = $this->db->get_where('route', array('routeID' => $id));
			return $query->result();
		}

		function getTransacDetail($id){
			$query = $this->db->get_where('transaction', array('bookingID' => $id));
			return $query->result();
		}

		function getPassDetail($id){
			$query = $this->db->get_where('passenger', array('passID' => $id));
			return $query->result();
		}

		function setNewPay($newPay){
			$this->db->insert('payment', $newPay);
		}

		function setNewTransac($newTransac){
			$this->db->insert('transaction', $newTransac);
		}

		function cancelTicket($bookingID,$passID,$payID){
			$this->db->delete('transaction', array('bookingID' => $bookingID)); 
			$this->db->delete('passenger', array('passID' => $passID)); 
			$this->db->delete('payment', array('payID' => $payID)); 
		}
	}
?>



