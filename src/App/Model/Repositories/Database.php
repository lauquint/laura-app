<?php

namespace App\Model\Repositories;

use App\Model\Repositories\Repository;

use Fw\Component\Databases\Database;

class DatabaseRepository implements Repository {

    protected $db;

    public function __construct(Database $db) {

        $this->db = $db;

    }



}

