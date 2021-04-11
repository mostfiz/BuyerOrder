<?php

namespace App\Controllers;

use Core\Controller;
use Core\Request;
use Core\View;
use Core\Validator;


class Reports extends Controller {

    /**
     * The index controller action
     * 
     * @return void
     * @access  public
     */
    public function index(): void {

        $from = Request::getParam("from", date("Y-m-01"));
        $to = Request::getParam("to", date("Y-m-t"));
        $month = Request::getParam("month", date("Y-m"));

       // Render view
        View::render("reports",compact(
                         [ "from", "to","month"]));
    }

    /**
     * The index controller action
     * 
     * @return void
     * @access  public
     */
    public function search() {

        $from = isset($_POST['from']) ? $_POST['from'] : ""; 
        $to = isset($_POST['to']) ? $_POST['to'] : ""; 
        $user_id = isset($_POST['to']) ? $_POST['to'] : ""; 
        $searchOrders = array();

        $orders = new \App\Models\Order();
        $searchOrders = $orders->getSearchData($from, $to , $user_id );

        // Render view
        View::render("reports",compact(
                     [ "from", "to","searchOrders"]));
    }


}
