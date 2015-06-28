<?php

namespace App\Model\Repositories;

use Fw\Component\Databases\Database;

interface Repository {

    public function __construct(Database $db);

}