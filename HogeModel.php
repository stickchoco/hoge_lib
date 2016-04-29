<?php

class HogeModel {

    /**
     *
     * @var DbAdapter
     */
    protected $db;

    function __construct() {
        $this->db = MainDb::makeAdapter();
    }


}