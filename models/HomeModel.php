<?php

class HomeModel extends BaseModel
{

 public function showLatestPhotos($user_id) {
     $statement = self::$db->prepare("SELECT * FROM photo WHERE user_id=?");
     $statement->bind_param("s", $user_id);
     $statement->execute();

     $result = $statement->get_result();

     $photos = [];

     while ($photo = $result->fetch_assoc()) {
         $photos[] = $photo;

     }
     return $photos;
 }



}
