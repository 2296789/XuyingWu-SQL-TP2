<?php
RequirePage::model('CRUD');
RequirePage::model('Article');
RequirePage::model('Categorie');
RequirePage::model('Auteur');
RequirePage::model('Commentaire');
RequirePage::library('Validation');

class ControllerArticle extends controller {
    public function index(){
        $article = new Article;
        $selectCategoriesAuteur = $article->articleCategoriAuteur();
        return Twig::render('article-index.php', [
            'articles'=>$selectCategoriesAuteur
        ]);
    }

    public function show($id){
        $article = new Article;
        $selectId = $article->selectId($id);
        $categorie = new Categorie;
        $selectCategorie = $categorie->selectId($selectId['categorie_id']);
        $auteur = new Auteur;
        $selectAuteur = $auteur->selectId($selectId['auteur_id']);

        return Twig::render('article-show.php', [
            'article'=>$selectId, 
            'categorie'=>$selectCategorie,
            'auteur'=> $selectAuteur
        ]);
    }

    public function edit($id){
        $article = new Article;
        $selectId = $article->selectId($id);
        $categorie = new Categorie;
        $selectCategories = $categorie->select('categorie');
        $auteur = new Auteur;
        $selectAuteurs = $auteur->select('nom');
        
        return Twig::render('article-edit.php', [
            'article'=>$selectId, 
            'categories'=>$selectCategories,
            'auteurs'=>$selectAuteurs
        ]);
    }

    public function create(){
        $categorie = new Categorie;
        $selectCategories = $categorie->select('categorie');
        $auteur = new Auteur;
        $selectAuteurs = $auteur->select('nom');
    
        return Twig::render('article-create.php', [
            'categories'=>$selectCategories,
            'auteurs'=>$selectAuteurs 
        ]);
    }

    public function store(){
        // extract($_POST);
        // $validation = new Validation;
        // $validation->name('titre')->value($titre)->max(200)->min(1);
        // $validation->name('texte')->value($texte)->max(1000)->min(1);
        // $validation->name('categorie')->value($categorie_id)->pattern('int');
        // $validation->name('auteur')->value($auteur_id)->pattern('int');

        // if(!$validation->isSuccess()){
            // $categorie = new Categorie;
            // $selectCategories = $categorie->select('categorie');
            // // print_r($selectCategories);
            // // echo '<br><br>';
            // $auteur = new Auteur;
            // $selectAuteurs = $auteur->select('nom');
            // print_r($selectAuteurs);
            // echo '<br><br>';
            // $errors =  $validation->displayErrors();
            // return Twig::render('client-create.php', [
            //     'categories'=>$selectCategories,
            //     'auteurs'=>$selectAuteurs,
            //     // 'errors'=>$errors, 
            //     'article'=>$_POST
            // ]);
            // exit();
        // }
        $article = new Article;
        $insert = $article->insert($_POST);
        RequirePage::url('article/show/'.$insert);
    }

    public function update(){
        print_r($_POST); die();
        // extract($_POST);
        // $validation = new Validation;
        // $validation->name('titre')->value($titre)->max(200)->min(1);
        // $validation->name('texte')->value($texte)->max(1000)->min(1);
        // $validation->name('categorie')->value($categorie_id)->pattern('int');
        // $validation->name('auteur')->value($auteur_id)->pattern('int');
 
        // if(!$validation->isSuccess()){
        //     // var_dump($validation->getErrors());
            // $categorie = new Categorie;
            // $selectCategories = $categorie->select('categorie');
            // $auteur = new Auteur;
            // $selectAuteurs = $auteur->select('nom');
            // $errors =  $validation->displayErrors();
            // return Twig::render('client-edit.php', [
            //     'categories'=>$selectCategories,
            //     'auteurs'=>$selectAuteurs,
            //     // 'errors'=>$errors, 
            //     'article'=>$_POST
            // ]);
            // exit();
        // }
         
        $article = new Article;
        $update = $article->update($_POST);

        //header('Location: ' . $_SERVER['HTTP_REFERER']);
        RequirePage::url('article/show/'.$_POST['id']);
    }

    public function destroy(){
        // print_r($_POST);
        $article = new Article;
        $update = $article->delete($_POST['id']);
        RequirePage::url('article/index');
    }
}
?>