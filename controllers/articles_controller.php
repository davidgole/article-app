<?php
/*
    Controller za novice. Vključuje naslednje standardne akcije:
        index: izpiše vse novice
        show: izpiše posamezno novico
        
    TODO:
        list: izpiše novice prijavljenega uporabnika
        create: izpiše obrazec za vstavljanje novice
        store: vstavi novico v bazo
        edit: izpiše vmesnik za urejanje novice
        update: posodobi novico v bazi
        delete: izbriše novico iz baze
*/

class articles_controller
{
    public function index()
    {
        //s pomočjo statične metode modela, dobimo seznam vseh novic
        //$ads bo na voljo v pogledu za vse oglase index.php
        $articles = Article::all();

        //pogled bo oblikoval seznam vseh oglasov v html kodo
        require_once('views/articles/index.php');
    }

    public function show()
    {
        //preverimo, če je uporabnik podal informacijo, o oglasu, ki ga želi pogledati
        if (!isset($_GET['id'])) {
            return call('pages', 'error'); //če ne, kličemo akcijo napaka na kontrolerju stran
            //retun smo nastavil za to, da se izvajanje kode v tej akciji ne nadaljuje
        }
        //drugače najdemo oglas in ga prikažemo
        $article = Article::find($_GET['id']);
        require_once('views/articles/show.php');
    }

    public function create(){
        $error = "";
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case 1: $error = "Izpolnite vse podatke"; break;
                default: $error = "Prišlo je do napake med objavo novice";
            }
        }
        require_once('views/articles/create.php');
    }

    function store(){
        //Preveri če so vsi podatki izpolnjeni
        if(empty($_POST["title"]) || empty($_POST["abstract"]) || empty($_POST["text"])){
            header("Location: /articles/create?error=1"); 
        }
        //Podatki so pravilno izpolnjeni, objavi novico
        else if(Article::create($_POST["title"], $_POST["abstract"], $_POST["text"])){
            header("Location: /");
        }
        //Prišlo je do napake pri objavi novice
        else{
            header("Location: /articles/create?error=2"); 
        }
        die();
    }

    public function user_article(){
        $user_id = $_SESSION["USER_ID"];
        //s pomočjo statične metode modela, dobimo seznam vseh novic uporabnika
        $articles = Article::userArticles($user_id);

        //pogled bo oblikoval seznam vseh oglasov uporabnika v html kodo
        require_once('views/articles/user_article.php');
    }

    function edit(){
        if(!isset($_SESSION["USER_ID"])){
            header("Location: /pages/error");
            die();
        }
        $article = Article::find($_GET["id"]);
        $error = "";
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case 1: $error = "Izpolnite vse podatke"; break;
                default: $error = "Prišlo je do napake med urejanjem novice.";
            }
        }
        require_once('views/articles/edit.php');
    }

    function update(){
        if(!isset($_SESSION["USER_ID"])){
            header("Location: /pages/error");
            die();
        }
        // Preveri, ali je nastavljen paramter id
        if(!isset($_POST["id"])){
            header("Location: /pages/error");
            exit();
        }
        $article = Article::find($_POST["id"]);
        //Preveri če so vsi podatki izpolnjeni
        if(empty($_POST["title"]) || empty($_POST["abstract"]) || empty($_POST["text"])){
            header("Location: /articles/edit?error=1"); 
        }
        //Podatki so pravilno izpolnjeni, registriraj uporabnika
        else if($article->update($_POST["title"], $_POST["abstract"], $_POST["text"])){
            header("Location: /articles/user_article");
        }
        //Prišlo je do napake pri registraciji
        else{
            header("Location: /articles/edit?error=2"); 
        }
        die();
    }
    function delete(){
        if(!isset($_SESSION["USER_ID"])){
            header("Location: /pages/error");
            die();
        }
        $article = Article::find($_GET["id"]);
        
        if($article->delete($_GET["id"])){
            header("Location: /articles/user_article");
        } else {
            header("Location: /pages/error");
        }
    }   
}