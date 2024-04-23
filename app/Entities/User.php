<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{

  protected $atributes = [
    'id' => null,
    'uuid' => '',
    'name' => '',
    'email' => '',
    'password' => '',
    'created_at' => null,
    'updated_at' => null,
    'deleted_at' => null

  ];
}
