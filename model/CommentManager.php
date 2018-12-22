<?php

	namespace MVC\Model;

	require_once('Manager.php');
	
	class CommentManager extends Manager
	{
		
		public function getComments($postId) {

			$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, author, comment_post, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date FROM comments WHERE post = ? ORDER BY comment_date DESC');

			$req->execute(array($postId));

		    return $req;
		}

		public function getComment($commentId) {

			$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, post, author, comment_post, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date FROM comments WHERE id = ?');
			$req->execute(array($commentId));

			$comment = $req->fetch();

		    return $comment;
		}

		public function postComment($postId, $author, $comment) {

			$db = $this->dbConnect();
			$comments = $db->prepare('INSERT INTO comments(post, author, comment_post, comment_date) VALUES(?, ?, ?, NOW())');
			$addLine = $comments->execute(array($postId, $author, $comment));

			return $addLine;
		}

		public function updateComment($author, $commentPost, $commentId) {

			$db = $this->dbConnect();
			$comment = $db->prepare('UPDATE comments SET author = ?, comment_post = ?, comment_date = NOW() WHERE id = ?');

			$comment->execute(array($author, $commentPost, $commentId ));

			return $comment;
		}
	}