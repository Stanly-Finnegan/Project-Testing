<?php 

namespace App\Controllers;

use App\Models\AuthenticationModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Ramsey\Uuid\Uuid;

class UserController extends BaseController{
  use ResponseTrait;

  public function loginUser () {
    $post_data = $this->request->getPost();

    $userModel = new UserModel();
    $authenticationModel = new AuthenticationModel();
 
    $userData = $userModel->where('email', $post_data['email'])->first();

    if($userData && password_verify($post_data['password'], $userData->password)){
      $authenticationData = [
        'uuid' => Uuid::uuid4(),
        'user_id' => $userData->id,
        'token' => Uuid::uuid4(),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
      ];
      
      if($authenticationModel->insert($authenticationData)){
        return $this->respond($authenticationData['token']);
      }
    }
    else{
      return $this->fail('Account does not match');
    }

  }

  public function registerUser () {
    $post_data = $this->request->getPost();
    $validatoin = \Config\Services::Validation();
    $validatoin->setRuleGroup('strongPasswordValidation');

    if($validatoin->run($post_data) === false){
      return $this->fail($validatoin->getErrors());
    }


    $data = [
      'uuid' => Uuid::uuid4(),
      'name' => $post_data['name'],
      'email' => $post_data['email'],
      'password' => password_hash($post_data['password'], PASSWORD_BCRYPT),
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => null,
      'deleted_at' => null
    ];


    $userModel = new UserModel();

    if($userModel->insert( $data )){
      return $this->respond('Register Successfully!');
    }
    else{
      return $this->fail('Fail  to Register Account. Please try again later.');
    }

  }

}

?>