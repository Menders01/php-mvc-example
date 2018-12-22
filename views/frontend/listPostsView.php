	<!-- Debut de la barre de navigation -->
	<?php include('header.php'); ?>

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
        </div>
    </div>
    <form action="./index.php?action=addPost" method="POST">  
        <div class="row">
            <div class="col-md-6" style="padding=0.5em;">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Ajouter un post !</h2>
                        <div class="form-group">
                            <label for="title" class="col-form-label">Titre du post</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                        <div class="form-group">
                              <label for="content">Contenu du post</label>
                              <textarea class="form-control" name="content" rows="1" required></textarea>
                        </div>
                        <div style="margin-top: 1em;">
                          <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Ajouter <i class="fa fa-calendar-plus-o"></i></button>
                        </div>
                    </div>
                </div>
            </div>
    </form>   
            <div class="col-md-6">
                <div class="card"> 
                    <div class="card-body">
                        <h2 class="card-title">Derniers Posts du blog !</h2>
                        <div class="col" style="width: auto;
                                            height: 225px;
                                            background-color: #E0E0E0;
                                            overflow-y: scroll;">
                          <?php
                            while ($data = $posts->fetch()){
                            ?>
                                <div class="m-1 alert alert-success alert-dismissible fade show" role="alert">
                                  <strong><?= htmlspecialchars($data['title']); ?></strong> <em><span class="badge badge-light"><?= htmlspecialchars($data['post_date']); ?></span></em><br> 
                                  <p style="width: auto;
                                            max-height: 50px;
                                            overflow-y: scroll;
                                            text-align: justify;"><?= nl2br(htmlspecialchars($data['content'])); ?></p>
                                  
                                  <i><a href="./index.php?action=post&id=<?= htmlspecialchars($data['id']) ?>"><span class="badge badge-success">commentaires <i class="fa fa-list"></i></span></a></i>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                            <?php
                            }
                            $posts->closeCursor();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
	<!-- Fin du contenu-->

    <?php require('footer.php'); ?>
</body>
</html>