<?php

namespace App\Controllers;

class UserAddressController extends BaseController
{

    public function getUserAddress()
    {
        $db = \Config\Database::connect();
        $userID = $this->request->getPost("user_id"); 
        $query = $db->query("SELECT * FROM user_address_tbl WHERE user_id = '$userID' and flag=1");
        $pets = $query->getResultArray();
        return $this->response->setJSON($pets);
    } 

    public function addUserAddress()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost(); 
        $sql = "INSERT INTO `user_address_tbl` ( `user_id`, `fname`, `lname`, `mobile_number`, `address_line`, `address_line_two`, `city`, `state`, `postal_code`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->query($sql, [
            $data['user_id'], 
            $data['fname'], 
            $data['lname'], 
            $data['mobile_number'], 
            $data['address_line'], 
            $data['address_line_two'], 
            $data['city'], 
            $data['state'],
            $data['postal_code']
        ]);
        if ($query) {
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'User address added successfully'
            ]);
        } 
        else {
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to add user address'
            ]);
        }
    }
    
    public function updateUserAddress()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $sql = "UPDATE `user_address_tbl` 
                SET `fname`=?,`lname`=?,`mobile_number`=?,`address_line`=?,`address_line_two`=?,`city`=?,`state`=?,`postal_code`=?
                WHERE `user_id` = ? AND `address_id` = ?";
        $query = $db->query($sql, [
            $data['fname'], 
            $data['lname'], 
            $data['mobile_number'], 
            $data['address_line'], 
            $data['address_line_two'], 
            $data['city'], 
            $data['state'],
            $data['postal_code'],
            $data['user_id'],
            $data['address_id']
        ]); 
        if ($query) { 
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Address updated successfully'
            ]);
        } else { 
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to update address'
            ]);
        }
    }

    public function deleteUserAddress()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $sql = "UPDATE `user_address_tbl` SET flag = 0 WHERE `address_id` = ?";
        $query = $db->query($sql, [  $data['userAddressID'] ]);
        if ($query) {
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Address deleted successfully'
            ]);
        } else {
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to delete address'
            ]);
        }
    }
    
    
    
    

}
