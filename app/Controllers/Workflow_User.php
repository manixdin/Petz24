<?php

namespace App\Controllers;

class Workflow_User extends BaseController
{

    # For Testing
    public function print($data){
        echo'<pre>';print_r($data);exit;
    }

    public function signinuser(){

        $request = \Config\Services::request();
        $data =  $request->getPost();

        if(!$data){
            echo $this->response_message(false); return;
        }

        $builder = $this->db->table('user_tbl');
        $response = $builder->getWhere(['email_id' => $data['email_id'], 'password' => $data['password']]);
        

        if(sizeof($response->getResultArray()) < 1){
            echo $this->response_message([
                'code' => 400,
                'msg' => 'Incorrect username or password'
            ]); return;
        }

        $res_data = $response->getResultArray()[0];

        if(!isset($res_data['user_id'])){
            echo $this->response_message(false); return;
        }

        echo $this->response_message([
            'code' => 200,
            'msg' => 'Login successfully!',
            'data' => $this->encryptData($res_data)
        ]);

    }

    public function signupUser(){

        $request = \Config\Services::request();
        $data =  $request->getPost();

        if(!$data){
            echo $this->response_message(false); return;
        }

        $builder = $this->db->table('user_tbl');
        $response = $builder->getWhere(['email_id' => $data['email_id']]);

        if(sizeof($response->getResultArray()) >= 1){
            echo $this->response_message([
                'code' => 400,
                'msg' => 'User already exist'
            ]); return;
        }

        if($builder->insert($data)){

            unset($data['password']);
            echo $this->response_message([
                'code' => 200,
                'msg' => 'Welcome '.$data['first_name'].'!',
                'data' => $this->encryptData($data)
            ]); return;
        }

        echo $this->response_message(false);
    }

    public function getSpecificUserData(){
        $request = \Config\Services::request();
        $data =  $request->getPost();

        $this->print($data);
    }

    public function updateSpecificUser(){
        $request = \Config\Services::request();
        $data =  $request->getPost();

        $builder = $this->db->table('user_tbl');
        if($builder->replace($data)){
            echo $this->response_message([
                'code' => 200,
                'msg' => 'User details changed successfully!!',
                'data' => $this->encryptData($data)
            ]); return;
        }

        echo $this->response_message(false);
    }

}
