<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Todolist extends Entity
{

  protected $atributes = [
    'id' => null,
    'uuid' => '',
    'user_id' => '',
    'title' => '',
    'image' =>'',
    'description' => '',
    'created_at' => null,
    'updated_at' => null,
    'deleted_at' => null

  ];
}
