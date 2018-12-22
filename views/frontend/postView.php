<!-- Header de la page -->
	<?php require('header.php'); ?>

	<!-- Debut du contenu -->
	

	<div class="container mt-3">
	    <div class="card person-card mb-2 shadow">
	        <div class="card-body">
	            
	            <p>
	              <h1>
	                <img id="img_sex" class="person-img" src="public/images/exercice.png" style="width: auto; height: 50px;"> 
	                MON SUPER BLOG...
	              </h1>
	            </p>    
	            <p><a href="index.php"><span class="badge badge-primary"><i class="fa fa-backward"></i> Retour à la liste des posts</span></a></p>            
	        </div>
	    </div>
    <form action="./index.php?action=addComment&id=<?= htmlspecialchars($post['id']) ?>" method="POST">  
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Ajouter un commentaire !</h2>
                        <div class="form-group">
                            <label for="author" class="col-form-label">Auteur du comment</label>
                            <input type="text" class="form-control" name="author" id="author" required>
                        </div>
                        <div class="form-group">
                              <label for="comment">Contenu du commentaire</label>
                              <textarea class="form-control" name="comment" id="comment" rows="1" required></textarea>
                        </div>
                        <div style="margin-top: 1em;">
                          <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><i class="fa fa-paper-plane-o"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    </form>   
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-body">
                        <h6 class="card-title">
                        	Post: <?= $post['title']; ?>
						    <em>le <?= $post['post_date']; ?></em>
						</h6>
						<h6 style="width: auto;
                                            max-height: 50px;
                                            background-color: #E3F2FD;
                                            overflow-y: scroll;">
							<?= $post['content']; ?>
						</h6>
						<hr>
                        <div class="col" style="width: auto;
                                            max-height: 210px;
                                            background-color: #E0E0E0;
                                            overflow-y: scroll;">
                          <?php
					        	while ($comment = $comments->fetch()) {
					        ?>
							        <div class="m-1 alert alert-warning alert-dismissible fade show" role="alert">
							            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> du <span class="badge badge-light"><?= $comment['comment_date'] ?></span></p>
							            <p style="width: auto;
                                            height: 70px;
                                            overflow-y: scroll;
                                            text-align: justify;"><?= nl2br(htmlspecialchars($comment['comment_post'])) ?></p>
							            <i><a href="./index.php?action=comment&id=<?= htmlspecialchars($comment['id']) ?>"><span class="badge badge-warning"><i class="fa fa-pencil-square-o"></i>Modifier</span></a></i>
								        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                                    	<span aria-hidden="true">&times;</span>
	                                  	</button>
                                  	</div>
					        <?php
					        	}
                                $comments->closeCursor();
					      	?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  	</div>
	<!-- Footer de la page -->
    <?php require('footer.php'); ?>
</body>
</html>