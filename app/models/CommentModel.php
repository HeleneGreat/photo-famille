<?php

namespace Projet\models;

class CommentModel extends Manager
{
    public function getPictureComments($picture_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "SELECT comment_id, nom, prenom, picture, content, DATE_FORMAT(created_at, '%d %M %Y à %kh%i') AS created_at
            FROM people
            INNER JOIN comments
            ON people.people_id = comments.people_id
            WHERE picture_id = ?
            ORDER BY comment_id DESC");
        $req->execute(array($picture_id));
        $query = $req->fetchAll();
        return $query;
    }

    // Add a new comment
    public function setNewComment($data)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "INSERT INTO comments (content, picture_id, people_id)
            VALUES (:content, :picture_id, :people_id)");
        $req->execute($data);
        return $req;
    }

    // Delete all comments associated with this picture
    public function deletePictureComments($picture_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM comments WHERE picture_id = ?");
        $req->execute(array($picture_id));
    }


}