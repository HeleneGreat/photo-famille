<?php

namespace Projet\Models;

class PictureModel extends Manager
{

   // Return a picture ID with this filename
   public function getPictureId($tempFilename)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT picture_id FROM pictures WHERE filename = ?"
         );
      $req->execute(array($tempFilename));
      $query = $req->fetch()[0];
      return $query;
   }

   public function saveNewPictures($data)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "INSERT INTO pictures (owner_id, filename)
         VALUES (:owner_id, :tempFilename)"
         );
      $req->execute($data);
   }

   // Rename the picture file in DB
   public function renameFile($data)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "UPDATE pictures
         SET filename = :newFilename
         WHERE picture_id = :picture_id"
         );
      $req->execute($data);
   }

   public function getUserPictureWithoutBranche($user_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT picture_id, filename
         FROM pictures 
         WHERE owner_id = ? AND brancheDefined = 'no'");
      $req->execute(array($user_id));
      $query = $req->fetchAll();
      return $query;
   }

   // Return all pictures with this branche id
   public function getBranchePictures($branche_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare("SELECT picture_id, created_at, owner_id, filename FROM pictures WHERE branche_id = ?");
      $req->execute(array($branche_id));
      $query = $req->fetchAll();
      return $query;
   }
   
   // Return all pictures from this user
   public function getUserPictures($user_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare("SELECT picture_id, created_at, owner_id, filename FROM pictures WHERE user_id = ?");
      $req->execute(array($user_id));
      $query = $req->fetchAll();
      return $query;
   }

   


}