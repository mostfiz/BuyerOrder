<?php

namespace App\Models;

use Core\Model;
use Core\Validator;

class Order extends Model {

    /**
     * The model construct
     *
     */
    public function __construct() {

        /**
         * The database table name.
         */
        parent::__construct("orders");
    }

    /**
     * Method save order records from database.
     * [Implemented method from the Model class]
     *
     * @return array
     * @access  public
     */
    public function save($data){
        return $this->insert($data);
    }

    /**
     * Method getting all records from database.
     * [Implemented method from the Model class]
     *
     * @return array
     * @access  public
     */
    public function getAll(): iterable {

        return $this->DB()
                        ->query('SELECT * FROM orders LIMIT 1')
                        ->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Method getting last 10 records from database.
     *
     * @return array
     * @access  public
     */
    public function getLastTen(): iterable {

        return $this->DB()
                        ->query('SELECT id,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`'
                                .',`city`,`phone`,`entry_at`,`entry_by`'
                                . 'FROM orders as o '
                                . 'ORDER BY id DESC '
                                . 'LIMIT 10')
                        ->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array  
     * @access  public
     */
    public function getSearchData(string $from = NULL, string $to = NULL, string $user_id = NULL): iterable {

        if (Validator::dates(compact(["from", "to"])) === false) {

            $from = date("Y-m-01");
            $to = date("Y-m-t");
        }

        return $this->DB()
                        ->query('SELECT id,`amount`,`buyer`,`receipt_id`,`items`,`buyer_email`,`buyer_ip`,`note`'
                                .',`city`,`phone`,`entry_at`,`entry_by`'
                                . 'FROM orders as o '
                                . 'WHERE (o.entry_at >= ' . " '$from' AND o.entry_at <= " . " '$to') 
                                OR o.entry_by = "."'$user_id'" .' ORDER BY id DESC ')
                        ->fetchAll(\PDO::FETCH_ASSOC);
    }

}
