<?php

namespace App\Controllers;

class UserPetController extends BaseController
{

    
    public function getUserPetList()
    {

      
        $db = \Config\Database::connect();
        $userID = $this->request->getPost("user_id"); 

        $query = $db->query("SELECT upt.*, p.pet_name, b.breed_name FROM `user_pet_tbl` upt inner join pet_tbl p ON p.pet_id = upt.pet_id inner join breed_tbl b ON b.breed_id = upt.breed_id WHERE upt.`user_id` = '$userID' and upt.flag=1");
        $pets = $query->getResultArray();


        return $this->response->setJSON($pets);
    }

    public function addUserPet()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost();

  
        $image_name="";

          if($_FILES['pet_img']['name'] != ''){
                $img = $this->request->getFile('pet_img');
                if (!$img->hasMoved()) {
                    $newName = $img->getRandomName(); // Generate a random file name
                    $img->move('uploads/pet', $newName); // Move the file to the uploads directory
                    $image_name= 'uploads/pet/'.$newName;          
                }
            }


    
 
        $sql = "INSERT INTO `user_pet_tbl` (`user_id`, `pet_id`, `breed_id`, `gender`, `date_of_birth`, `name`, `age_year`, `age_month`, `pet_img`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $query = $db->query($sql, [
            $data['user_id'], 
            $data['pet_id'], 
            $data['breed_id'], 
            $data['gender'], 
            $data['date_of_birth'], 
            $data['name'], 
            $data['age_year'], 
            $data['age_month'],
            $image_name
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
    $image_name = $data['old_img']; // default to old image

    // Check if new image is uploaded
    if (!empty($_FILES['pet_img']['name'])) {
        $img = $this->request->getFile('pet_img');

        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $uploadPath = 'uploads/pet/' . $newName;
            $img->move('uploads/pet', $newName);
            $image_name = $uploadPath;

            // Delete the old image if exists
            if (file_exists($data['old_img'])) {
                @unlink($data['old_img']);
            }
        }
    }

    $sql = "UPDATE `user_pet_tbl` 
            SET `pet_id` = ?, `breed_id` = ?, `gender` = ?, 
                `date_of_birth` = ?, `name` = ?, `age_year` = ?, `age_month` = ?, `pet_img` = ?
            WHERE `user_id` = ? AND `user_pety_id` = ?";
    
    $query = $db->query($sql, [
        $data['pet_id'], 
        $data['breed_id'], 
        $data['gender'], 
        $data['date_of_birth'], 
        $data['name'], 
        $data['age_year'], 
        $data['age_month'],
        $image_name,                   // updated image name or old image
        $data['user_id'],
        $data['user_pety_id']
    ]);

    if ($query) {
        return $this->response->setJSON([
            "code" => 200,
            'msg' => 'Pet information updated successfully'
        ]);
    } else {
        return $this->response->setJSON([
            "code" => 400,
            'msg' => 'Failed to update pet information'
        ]);
    }
}

    
 public function deleteUserPet()
{
    $data = $this->request->getPost();

    $userPetID = $data['user_pety_id'] ?? null;
    $petImgPath = $data['pet_img'] ?? '';

    if (!$userPetID) {
        return $this->response->setJSON([
            "code" => 400,
            'msg' => 'Missing user_pety_id'
        ]);
    }

    $db = \Config\Database::connect();

    // Step 1: Delete from DB
    $sql = "DELETE FROM `user_pet_tbl` WHERE `user_pety_id` = ?";
    $query = $db->query($sql, [$userPetID]);

    // Step 2: Delete file if query successful
    if ($query) {
        if (!empty($petImgPath) && file_exists($petImgPath)) {
            @unlink($petImgPath); // Remove the image file from server
        }

        return $this->response->setJSON([
            "code" => 200,
            'msg' => 'Pet information permanently deleted'
        ]);
    } else {
        return $this->response->setJSON([
            "code" => 400,
            'msg' => 'Failed to delete pet'
        ]);
    }
}

}