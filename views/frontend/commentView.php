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
	            <p><a href="./index.php?action=post&id=<?= htmlspecialchars($comment['post']) ?>"><span class="badge badge-primary"><i class="fa fa-backward"></i> Précédent </span></a></p><p><a href="index.php"><span class="badge badge-primary"><i class="fa fa-fast-backward"></i> Retour à la liste des posts</span></a></p>            
	        </div>
	    </div>
	    <form action="./index.php?action=editComment&id=<?= htmlspecialchars($comment['id']) ?>" method="POST">
	        <div class="card person-card">
	            <div class="card-body">
	                <h2 id="who_message" class="card-title">Modifier un comment !</h2>
	                <div class="row">
	                    <div class="form-group col-md-5">
	                        <input id="author" name="author" type="text" class="form-control" value="<?= htmlspecialchars($comment['author']) ?>">
	                    </div>
	                    <div class="form-group col-md-5">
	                        <textarea id="comment" name="comment" class="form-control" rows="1" cols="5"><?= htmlspecialchars($comment['comment_post']) ?></textarea>
	                    </div>
	                    <div class="form-group col-md-2">
	                        <button type="submit" class="form-control btn btn-outline-warning"><i class="fa fa-pencil-square-o"></i>Modifier</button>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </form>
	</div>

	<!-- Footer de la page -->
    <?php require('footer.php'); ?>
</body>
</html>