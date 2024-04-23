<?php

namespace APp\Models;

use CodeIgniter\Model;
use Config\App;

class UserModel extends Model
{

  protected $table = 'auth_trs';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useSoftDeletes = false;


  protected $allowedFields = [
    'uuid',
    'user_id',
    'token',
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  protected $returnType = \App\Entities\User::class;


  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';

  protected $validationRules = [
    'uuid' => [
      'label' =>  'UUID',
      'rules' => 'required|is_unique[auth_trs.uuid]'
    ],
    'user_id' => [
      'label' => 'User ID',
      'rules' => 'required'
    ],
    'token' => [
      'label' => 'Auth Token',
      'rules' => 'required'
    ],

  ];

  protected $skipValidation = false;
  protected $cleanValidationRules = true;
}
