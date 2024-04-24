<?php 

namespace App\Controllers;

use App\Models\AuthenticationModel;
use App\Models\TodolistModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use Ramsey\Uuid\Uuid;

class DataController extends BaseController{
  use ResponseTrait;

  function _checkAuthorization() {
    $bearerToken = $this->request->getHeaderLine('Authorization');

    if((string) $bearerToken !== '' && (string) $bearerToken !== null){
      $explodeBearerToken = explode(' ', $bearerToken);

      if($explodeBearerToken[0] === 'Bearer'){
        return $explodeBearerToken[1];
      }
    }
    return 'kosong';
  }

  public function fetchData (){
    $jwt = $this->_checkAuthorization();


    $todolistModel = new TodolistModel();
    $authenticationModel =  new AuthenticationModel();
    $userModel = new UserModel();

    $authData = $authenticationModel->where('token', $jwt)->first();

    $user_name = $userModel->select('name')->where('id', $authData->user_id)->first();
    if($user_name->name){
      // $data = $todolistModel->select('uuid, title, image, description')->where('id', $authData->user_id)->findAll;
      return $this->respond($user_name->name);
    }else{
      return $this->fail('Invalid user!');
    }

  }

  public function addData (){
    $post_data = $this->request->getPost();
    $file_data = $this->request->getFile('attachment');
    $path = './Data/uploads/image';


    $jwt = $this->_checkAuthorization();
    $authenticationModel = new AuthenticationModel();
    $authData = $authenticationModel->select('user_id')->where('token',$jwt)->first();
    $user_id = $authData->user_id;

    if(!is_dir($path)){ 
      mkdir($path,0755,true);
    }

    $todolistModel = new TodolistModel();

    if($file_data->isValid() && !$file_data->hasMoved() && $user_id){
      $newname = $file_data->getRandomName();

      $data = [
        'user_id' => $user_id,
        'uuid' => Uuid::uuid4(),
        'title' => $post_data['title'],
        'description' => $post_data['description'],
        'image' => $newname,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => null,
        'deleted_at' => null
      ];

      if($todolistModel->insert($data)){
        return $this->respond('Successfully added data.');
        $file_data->move($path,$newname);

      }else {
        return $this->fail('Failed to add data. Please try again later.');
      }
    }else{
      return $this->fail('Failed to add data.');
    }
  }
}



?>