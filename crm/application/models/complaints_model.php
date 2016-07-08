<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class complaints_model extends CI_Model
	 {
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
 		function show_complaints()
		{
			$this->db->select('*');
			$this->db->from('ticket');
			$get_complaint = $this->db->get();
			return $get_complaint->result();
		}
		function popup_complaints($id)
		{
			$this->db->select('*');
			$this->db->from('ticket');
			$this->db ->where('t_id', $id);
			$get_complaintdetails = $this->db->get();
			return $get_complaintdetails->result();
		}
		function update_status($id,$data)
		{	
			$this->db->where('t_id', $id);
			$this->db->update('ticket', $data);
		}
		
		
	
		
		
		
		
		
		public function fillgrid()
			{
			$this->db->select("*");
			$this->db->order_by("t_id", "desc"); 
			$this->db->from('ticket');
			$this->db->join('usermaster','usermaster.uid = ticket.create_id');
			$data = $this->db->get();
				
						
				foreach ($data->result() as $row)
				{
				        $date= $row->date;
        				$fdate=date('d M Y',strtotime($date));  

					$view = base_url().'index.php/complaints/popup/';
					echo "<tr>
					<td>$row->t_id</td>
					<td>$fdate</td>
					<td>$row->transaction_id</td>
					<td>$row->reason</td>
					<td>$row->username</td>
					<td>
					<a href='$view' data-id='$row->t_id' class='btnstatus' title='status'>";if($row->status=="2")
					{ echo "Sloved"; }
					 else{echo "Processing";}
					echo "</a>
					</td> 
					
					</tr>";	
				}
       			 exit;
			}
				 private function popup()
				 {}			
	 }