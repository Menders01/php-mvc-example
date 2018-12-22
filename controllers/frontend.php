<?php 
	
	require_once('./model/PostManager.php');
	require_once('./model/CommentManager.php');

	function addPost($title, $content) {
		
		$postManager = new \MVC\Model\PostManager();
		$addPost = $postManager->insertPost($title, $content);

		if($addPost === false) {
			throw new Exception('Impossible d\'ajouter le Post !');
		}else {
			header('Location: index.php');
		}
	}

	function listPosts() {
		$postManager = new \MVC\Model\PostManager();
		$posts = $postManager->getPosts();

		require('./views/frontend/listPostsView.php');
	}

	function post() {
		$postManager = new \MVC\Model\PostManager();
		$commentManager = new \MVC\Model\CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('./views/frontend/postView.php');
	}

	function addComment($postId, $author, $comment) {
		$commentManager = new \MVC\Model\CommentManager();

		$addLine = $commentManager->postComment($postId, $author, $comment);

		if($addLine === false) {
			throw new Exception('Impossible d\'ajouter le commentaire !');
		}else {
			header('Location: index.php?action=post&id=' .$postId);
		}
	}

	function comment() {
		$postManager = new \MVC\Model\PostManager();
		$commentManager = new \MVC\Model\CommentManager();

		$post = $postManager->getPost($_GET['id']);
		$comment = $commentManager->getComment($_GET['id']);

		require('./views/frontend/commentView.php');
	}

	function editComment($author, $comment, $commentId) {

		$commentManager = new \MVC\Model\CommentManager();

		$editLine = $commentManager->updateComment($author, $comment, $commentId);

		if($editLine === false) {
			throw new Exception('Impossible d\'ajouter le commentaire !');
		}else {
			header('Location: index.php?action=comment&id=' .$commentId);
		}
	}