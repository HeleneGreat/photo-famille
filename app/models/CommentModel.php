<?php

namespace Projet\models;

class CommentModel extends Manager
{
    public function getPictureComments($picture_id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare(
            "SELECT comment_id, nom, prenom, picture, content, DATE_FORMAT(created_at, '%d %M %Y à %kh%i') AS created_at
            FROM users
            INNER JOIN comments
            ON users.user_id = comments.user_id
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
            "INSERT INTO comments (content, picture_id, user_id)
            VALUES (:content, :picture_id, :user_id)");
        $req->execute($data);
        return $req;
    }




}