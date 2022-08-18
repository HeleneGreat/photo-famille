<?php

namespace Projet\controllers;

class CommentController extends Controller
{

    // Publish a new comment under a picture
    public function commentForm($picture_id, $post)
    {
        $comment = new \Projet\Models\CommentModel();
        $data = [
            ':content' => htmlspecialchars(($post['content'])),
            ':picture_id' => $picture_id,
            ':people_id' => $_SESSION['people_id']
        ];
        $comment->setNewComment($data);
        // TODO MSG : renvoyer à la notif "votre commentaire à bien été publié"
        header('Location: index.php?action=photo&id=' . $data[':picture_id']. '#comment-form');
    }

}