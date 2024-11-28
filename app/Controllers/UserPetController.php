<?php

namespace App\Controllers;

class UserPetController extends BaseController
{

    
    public function getUserPetList()
    {
        $db = \Config\Database::connect();
        $userID = $this->request->getPost("user_id"); 
        $query = $db->query("SELECT upt.*, p.pet_name, p.pet_img, b.breed_name FROM `user_pet_tbl` upt inner join pet_tbl p ON p.pet_id = upt.pet_id inner join breed_tbl b ON b.breed_id = upt.breed_id WHERE upt.`user_id` = '$userID' and upt.flag=1");
        $pets = $query->getResultArray();
        return $this->response->setJSON($pets);
    }

    public function addUserPet()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $sql = "INSERT INTO `user_pet_tbl` (`user_id`, `pet_id`, `breed_id`, `gender`, `date_of_birth`, `name`, `age_year`, `age_month`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $query = $db->query($sql, [
            $data['user_id'], 
            $data['pet_id'], 
            $data['breed_id'], 
            $data['gender'], 
            $data['date_of_birth'], 
            $data['name'], 
            $data['age_year'], 
            $data['age_month']
        ]);
        if ($query) {
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Pet information added successfully'
            ]);
        } 
        else {
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to add pet information'
            ]);
        }
    }

    public function updateUserPet()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $sql = "UPDATE `user_pet_tbl` 
                SET `pet_id` = ?, `breed_id` = ?, `gender` = ?, 
                    `date_of_birth` = ?, `name` = ?, `age_year` = ?, `age_month` = ?
                WHERE `user_id` = ? AND `user_pety_id` = ?";
        $query = $db->query($sql, [
            $data['pet_id'], 
            $data['breed_id'], 
            $data['gender'], 
            $data['date_of_birth'], 
            $data['name'], 
            $data['age_year'], 
            $data['age_month'],
            $data['user_id'],
            $data['user_pety_id']
        ]);
        
        // Check if the query was successful
        if ($query) {
            // Success response
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Pet information updated successfully'
            ]);
        } else {
            // Error response
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to update pet information'
            ]);
        }
    }
    
    public function deleteUserPet()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();
        $sql = "UPDATE `user_pet_tbl` SET flag = 0 WHERE `user_pety_id` = ?";
        $query = $db->query($sql, [  $data['userPetID'] ]);
        
        // Check if the query was successful
        if ($query) {
            // Success response
            return $this->response->setJSON([
                "code" => 200,
                'msg' => 'Pet information deleted successfully'
            ]);
        } else {
            // Error response
            return $this->response->setJSON([
                "code" => 400,
                'msg' => 'Failed to update pet information'
            ]);
        }
    }
}
