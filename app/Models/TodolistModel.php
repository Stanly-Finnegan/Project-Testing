<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\App;

class TodolistModel extends Model
{

  protected $table = 'todolist_trs';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useSoftDeletes = false;

  protected $allowedFields = [
    'uuid',
    'user_id',
    'title',
    'image',
    'description',
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  protected $returnType = \App\Entities\Todolist::class;


  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';

  protected $validationRules = [
    // 'uuid' => [
    //   'label' =>  'UUID',
    //   'rules' => 'required|is_unique[todolist_trs.uuid]'
    // ],
    'user_id' => [
      'label' =>  'User ID',
      'rules' => 'required'
    ],
    'title' => [
      'label' => 'Title',
      'rules' => 'required'
    ],
    'image' => [
      'label' => 'Image',
      'rules' => 'required'
    ],
    'description' => [
      'label' => 'Description',
      'rules' => 'required'
    ],

  ];

  protected $skipValidation = false;
  protected $cleanValidationRules = true;
}
