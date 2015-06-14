<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invoice extends CI_Controller{
   
    public function index() {
        
        $this->load->view('design/header');
        $this->load->view('invoice/index');
        $this->load->view('design/footer');
    }

    public function insert_invoice()
    {
    	$this->load->model('invoice_model');
    	$result=$this->invoice_model->insert_invoice();
    	if($result)
    	{
    		$this->session->set_flashdata('msg','Invoice Added Successfully');
    		redirect('invoice');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg','Invoice Adding Failed ');
    		redirect('invoice');
    	}
    }
    public function invoice_reports()
    {
    	$this->db->where('status',1);
    	$data['invoice']=$this->db->get('invoice_details')->result();
    	$this->load->view('design/header',$data);
        $this->load->view('invoice/invoice_reports');
        $this->load->view('design/footer');
    }
    public function delete_invoice()
    {
    	$this->db->where('id',$_POST['id']);
    	$this->db->update('invoice_details',array('status'=>0));
    	$result=($this->db->affected_rows()!=1)?false:true;
    	if($result)
    	{
    		$this->session->set_flashdata('msg1','Invoice deleted Successfully');
    		redirect('invoice/invoice_reports');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg1','Invoice delete Failed ');
    		redirect('invoice/invoice_reports');
    	}
    }
}

