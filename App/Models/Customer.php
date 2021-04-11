<?php

namespace App\Models;

use Core\Model;

class Customer extends Model {

    /**
     * The model construct
     *
     */
    public function __construct() {

        /**
         * The database table name.
         */
        parent::__construct("customers");
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
                        ->query('SELECT id, first_name FROM customers')
                        ->fetchAll(\PDO::FETCH_ASSOC);
    }

}
