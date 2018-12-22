<?php 
    require('./controllers/frontend.php'); 

    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'listPosts') {
                listPosts();
            } elseif ($_GET['action'] == 'addPost') {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        addPost($_POST['title'], $_POST['content']);
                    }else {
                        throw new Exception('Erreur: Champ manquant !');
                    }
            }elseif ($_GET['action'] == 'post') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    post();
                }else {
                    throw new Exception('Erreur: Ce post n\'existe pas encore');
                }
            } elseif ($_GET['action'] == 'addComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }else {
                        throw new Exception('Erreur: Champ manquant !');
                    }
                }else {
                    throw new Exception('Erreur: Commentaire non ajouter !');
                }
            } elseif ($_GET['action'] == 'comment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    comment();
                }else {
                    throw new Exception('Erreur: Ce post n\'existe pas encore');
                }
            } elseif ($_GET['action'] == 'editComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                        editComment($_POST['author'], $_POST['comment'], $_GET['id']);
                    }else {
                        throw new Exception('Erreur: Champ manquant !');
                    }
                }else {
                    throw new Exception('Erreur: Ce post n\'existe pas encore');
                }
            }
        }else {
            listPosts();
        }
    } catch(Exception $e) {
        echo 'Erreur : ' .$e->getMessage();
    }
    