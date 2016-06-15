<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class mobile_no_change_model extends CI_Model {
    
	 public function update_mobile_no($id,$fn,$ln,$mob)
   {
		 
			$data =	array('name'=>$fn,
        'mobile'=>$mob,
                   );
			$this->db->where('uid', $id);
			$query=$this->db->update('usermaster', $data);
			return true;
   
   }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function fillgrid(){
	$val=$this->session->userdata('type');
	$leave_id=$this->session->userdata('uid');
	$del="no";
	$this->db->order_by("uid", "desc"); 
	$this->db->where('isdelete',$del);
	$this->db->where('uid != ', $leave_id);
	$this->db->where('parent_id', $leave_id);
    $data = $this->db->get('usermaster');
   
		
        foreach ($data->result() as $row){
            $edit = base_url().'mobile_no_change/edit/';
		
            echo "<tr>         
                        <td>$row->name</td><ol><ul><li><h4>This is the content for Layout H4 Tag</h4></li></ul></ol>
                        <td>$row->companyname</td>
                        <td>$row->mobile</td>";
                        
                        
         
      $parent=$row->parent_id;
      $this->db->select('*');
      $this->db->from('usermaster');
      $this->db->where('uid',$parent);                             
      $query = $this->db->get(); 
      foreach ($query->result() as $row2)
      {
	
         echo "<td>$row2->name</td>";

      }               
					echo"
                        <td><a href='$edit' data-id='$row->uid' class='btnedit' title='edit'>"; ?>
						<img src='<?php echo base_url(); ?>img/edit.png' height="20" width="20" title='Change Mobile No'>
						<?php echo "</a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						
						
						
						 </td> 						
                    </tr>";
            
        }
        exit;
    }
    
	 public function ids($id)
        {
		 
		$this->db->where('uid',$id);
        $data = $this->db->get('usermaster');
		if($data)
		{
			return $data;
		}
			return false;
   
       }
   

    public function modify($name,$new_mobile_no,$idd)
        {
		 
		$data =	array('name'=>$name,
        'mobile'=>$new_mobile_no,
                   );
			$this->db->where('uid', $idd);
			$query=$this->db->update('usermaster', $data);
			echo "<script type='text/javascript'>alert('update Successfully'); window.location.href = 'mobile_no_change';  </script>"; 
			return true;
   
       }
 	
}

?>