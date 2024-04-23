<?php

namespace APp\Models;

use CodeIgniter\Model;
use Config\App;

class UserModel extends Model
{

  protected $table = 'user_ms';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $useSoftDeletes = false;


  protected $allowedFields = [
    'id',
    'uuid',
    'name',
    'email',
    'password',
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

  // protected $validationRules = [
  //   'uuid' => [
  //     'label' =>  'UUID',
  //     'rules' => 'required|is_unique[user_ms.uuid]'
  //   ],
  //   'name' => [
  //     'label' => 'User Name',
  //     'rules' => 'required|max_length[35]|alpha_numeric_punct'
  //   ],
  //   'email' => [
  //     'label' => 'Email',
  //     'rules' => 'required|valid_email|is_unique[user_ms.email]'
  //   ],
  //   'password' => [
  //     'label' => 'Password',
  //     'rules' => 'required|min_length[6]|max_length[35]'
  //   ],

  // ];

  // protected $skipValidation = false;
  // protected $cleanValidationRules = true;
}
