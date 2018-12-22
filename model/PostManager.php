<?php

	namespace MVC\Model;

	require_once('Manager.php');

	class PostManager extends Manager
	{
		public function insertPost($title, $content) {

			$db = $this->dbConnect();
			$ins = $db->prepare('INSERT INTO post(title, content, post_date) VALUES(?, ?, NOW())');
			$addPost = $ins->execute(array($title, $content));

			return $addPost;
		}

		public function getPosts() {
			
			$db = $this->dbConnect();
		    $req = $db->query('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") AS
		        post_date FROM post ORDER BY ID DESC');

		    return $req;
		}

		public function getPost($postId) {

			$db = $this->dbConnect();
			$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(post_date, "%d/%m/%Y à %Hh%imin%ss") AS
		        post_date FROM post WHERE id = ?');
			$req->execute(array($postId));
			$post = $req->fetch();

		    return $post;
		}

	}