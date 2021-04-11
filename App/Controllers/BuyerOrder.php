<?php

namespace App\Controllers;

use Core\Controller;
use Core\Request;
use Core\View;
use Core\Validator;


class BuyerOrder extends Controller {

    /**
     * The index controller action
     * 
     * @return void
     * @access  public
     */
    public function index(): void {

       // Render view
        View::render("buyerOrder",array());
    }

    /**
     * The save controller action
     * 
     * @return void
     * @access  public
     */
    public function save(): void{

        $errors = [];
        $data = [];

        if (empty($_POST['amount'])) {
            $errors['amount'] = 'amount is required.';
        }
        else
        {
            $data['amount'] = $this->validate_input($_POST['amount']);
        }

        if (empty($_POST['buyer'])) {
            $errors['buyer'] = 'buyer is required.';
        }
        else
        {
            $data['buyer'] = $this->validate_input($_POST['buyer']);
        }

        if (empty($_POST['receipt_id'])) {
            $errors['receipt_id'] = 'receipt_id is required.';
        }
        else
        {
            $data['receipt_id'] = $this->validate_input($_POST['receipt_id']);
        }

        if (empty($_POST['items'])) {
            $errors['items'] = 'items is required.';
        }
        else
        {
            $data['items'] = json_encode($_POST['items']);
        }

        if (empty($_POST['buyer_email'])) {
            $errors['buyer_email'] = 'buyer_email is required.';
        }
        else{
            if (!filter_var($_POST['buyer_email'], FILTER_VALIDATE_EMAIL)) {
               $errors['buyer_email']  = "Invalid format and please re-enter valid email"; 
            }
            else
            {
                $data['buyer_email'] = $this->validate_input($_POST['buyer_email']);
            }
        }

        if (empty($_POST['note'])) {
            $errors['note'] = 'note is required.';
        }
        else
        {
            $data['note'] = $this->validate_input($_POST['note']);
        }
        if (empty($_POST['city'])) {
            $errors['city'] = 'city is required.';
        }
        else
        {
            $data['city'] = $this->validate_input($_POST['city']);
        }

        if (empty($_POST['phone'])) {
            $errors['phone'] = 'phone is required.';
        }
        else
        {
            $data['phone'] = "880".$this->validate_input($_POST['phone']);
        }

        if (empty($_POST['entry_by'])) {
            $errors['entry_by'] = 'entry_by is required.';
        }
        else
        {
            $data['entry_by'] = $this->validate_input($_POST['entry_by']);
        }
        
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $data["entry_at"] = date('Y-m-d');
            $data["hash_key"] = crypt($_POST['receipt_id'], '$6$rounds=5000$'.$_POST['phone'].$_POST['entry_by'].$_POST['amount'].'Thisis@My#Salt$');
            $data["buyer_ip"] = $this->getIPAddress();
            $orders = new \App\Models\Order();
            $saveOrders = $orders->save($data);
            $data['success'] = true;
            $data['message'] = 'Success!';
        }

        echo json_encode($data);

    }
    /**
     * The validate_input controller action
     * 
     * @return void
     * @access  private
     */
    private function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * The getIPAddress controller action
     * 
     * @return void
     * @access  private
     */
    private function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }   

}
