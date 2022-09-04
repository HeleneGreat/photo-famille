<?php

namespace Projet\models;

class PictureModel extends Manager
{

   // Return a picture ID with this filename OK
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

   // Set new picture's filename OK
   public function saveNewPictures($data)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "INSERT INTO pictures (owner_id, filename)
         VALUES (:owner_id, :tempFilename)"
         );
      $req->execute($data);
   }

   // Rename the picture file in DB OK
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

   // Get the user's pictures that don't have a branche yet OK
   public function getUserPictureWithoutBranche($people_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT picture_id, filename
         FROM pictures 
         WHERE owner_id = ? AND brancheDefined = 'no'");
      $req->execute(array($people_id));
      $query = $req->fetchAll();
      return $query;
   }

   // Return all pictures with this branche id OK
   public function getBranchePictures($branche_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT pictures.picture_id, created_at, owner_id, filename, pictures_branches.branche_id
         FROM pictures
         JOIN pictures_branches ON pictures_branches.picture_id = pictures.picture_id
         JOIN branches ON pictures_branches.branche_id = branches.branche_id
         WHERE pictures_branches.branche_id = ?
         ORDER BY pictures.picture_id DESC");
      $req->execute(array($branche_id));
      $query = $req->fetchAll();
      return $query;
   }
   
   // Return all pictures from this user OK
   public function getUserPictures($people_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare("SELECT picture_id, created_at, owner_id, filename FROM pictures WHERE owner_id = ?");
      $req->execute(array($people_id));
      $query = $req->fetchAll();
      return $query;
   }

   // Return all pictures with this person taggued OK
   public function getTagPictures($tag_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT pictures.picture_id, owner_id, filename, nom, prenom, isUser, people.picture, people.people_id
         FROM pictures
         JOIN pictures_people ON pictures_people.picture_id = pictures.picture_id
         JOIN people ON pictures_people.people_id = people.people_id
         WHERE pictures_people.people_id = ?
         ORDER BY pictures.picture_id DESC");
      $req->execute(array($tag_id));
      $query = $req->fetchAll();
      return $query;
   }

   // Return all pictures with this owner OK
   public function getOwnerPictures($owner_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT pictures.picture_id, owner_id, filename
         FROM pictures
         WHERE owner_id = '{$owner_id}'
         ORDER BY pictures.picture_id DESC");
      $req->execute();
      $query = $req->fetchAll();
      return $query;
   }

   // Get information about this picture OK
   public function getPictureInfo($picture_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT picture_id, nom, prenom, created_at, owner_id, filename, dayPicture, monthPicture, yearPicture, locationPicture, description
         FROM pictures
         INNER JOIN people on people.people_id = pictures.owner_id
         WHERE picture_id = ?");
      $req->execute(array($picture_id));
      $query = $req->fetch();
      return $query;
   }
   
   // Update the picture information
   public function updatePictureInfo($data)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "UPDATE pictures
         SET dayPicture = :dayPicture,
         monthPicture = :monthPicture, 
         yearPicture = :yearPicture,
         locationPicture = :locationPicture,
         description = :descriptionPicture
         WHERE picture_id = :picture_id");
      $req->execute($data);
   }


   // List of people tagged on the picture OK
   public function getPicturePeople($picture_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "SELECT people.people_id, nom, prenom, picture, isUser
         FROM pictures
         JOIN pictures_people ON pictures_people.picture_id = pictures.picture_id
         JOIN people ON pictures_people.people_id = people.people_id
         WHERE pictures.picture_id = ?
         ORDER BY nom, prenom ASC");
      $req->execute(array($picture_id));
      $query = $req->fetchAll();
      return $query;
   }

   // Add a link between a person and a picture OK
   public function setPictureTag($picture_id, $people_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare(
         "INSERT INTO pictures_people (picture_id, people_id)
         VALUE ('{$picture_id}', '{$people_id}')");
      $req->execute();
      return $req;
   }

   // Delete all tags associated with this picture
   public function deletePictureTags($picture_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare("DELETE FROM pictures_people WHERE picture_id = ?");
      $req->execute(array($picture_id));
   }

   // Delete this picture
   public function deletePicture($picture_id)
   {
      $bdd = $this->dbConnect();
      $req = $bdd->prepare("DELETE FROM pictures WHERE picture_id = ?");
      $req->execute(array($picture_id));
   }



}