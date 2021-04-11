<?php

namespace App\Controllers;

use Core\Controller;
use Core\Request;
use Core\View;
use Core\Validator;


class Home extends Controller {

    /**
     * The index controller action
     * 
     * It displays the statistics: 
     *  - The total number of orders, customers and revenue.
     *  - Monthly chart
     *  - Latest 10 orders.
     *
     * @return void
     * @access  public
     */
    public function index(): void {

        // Request params
        $from = Request::getParam("from", date("Y-m-01"));
        $to = Request::getParam("to", date("Y-m-t"));
        $month = Request::getParam("month", date("Y-m"));

        $mdlOrders = new \App\Models\Order();
        $orders = $mdlOrders->getLastTen();

        // Render view
        View::render("home", compact(
                        [ "from", "to", "month", "orders"]
        ));
    }

}
