<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


     class mobile_no_change extends CI_Controller 
	 {

       public function __construct() {
        parent::__construct();
       $this->load->model('mobile_no_change_model');
       $this->load->library('form_validation');
       $this->load->helper('url');     
	   $this->load->library('form_validation');
	   $this->load->helper('string');
	   $this->load->helper('date');
	   $this->load->database();
     }
    public function index()
    {
	if($this->session->userdata('uid')!="")
	{ 
$data['type']=$this->session->userdata('type');
		$this->load->view("common/header");
		$this->load->view("common/menu");
		$this->load->view('mobile_no_change',$data);
		$this->load->view("common/footer");
	}
	else
	{
		redirect(site_url('user/index'));
	}
   }

   
   public function mobile_no_update()
{
	$id = $_POST['id'];
	$fn = $_POST['fn'];
	$ln = $_POST['ln'];
	$mob = $_POST['mob'];

	if(isset($fn) && isset($ln) && isset($mob) )
	{
		$update = $this->mobile_no_change_model->update_mobile_no($id,$fn,$ln,$mob);
		if($update)
		{
			echo "Successfully  Updated ";
		} 
		else
		{
			echo "Fail Update Data";
		}
	}
}

}







