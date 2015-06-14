<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Invoice_model extends CI_Model{

	Public function insert_invoice()
	{
		$item_name=implode(',',$_POST['item']);
    	$rate=implode(',',$_POST['rate']);
    	$quantity=implode(',',$_POST['quantity']);
    	$tax=implode(',',$_POST['tax']);
    	$amount=implode(',',$_POST['amount']);

    	$data=array(
    		'customer_name'=>'Boomi',
    		'date'=>date('d-m-Y'),
    		'name'=>$item_name,
    		'rate'=>$rate,
    		'quantity'=>$quantity,
    		'tax'=>$tax,
    		'amount'=>$amount,
    		'sub_total'=>$_POST['sub_total'],
    		'o_tax'=>$_POST['o_tax'],
    		'grand_total'=>$_POST['grand_total'],
    		'status'=>1
    		);

    	$this->db->insert('invoice_details',$data);
    	return($this->db->affected_rows()!=1)?false:true;

	}
}