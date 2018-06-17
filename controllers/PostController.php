<?php

namespace Blog\Controllers;

use Blog\Models\Post;

include './utils/images.php';

// https://laravel.com/docs/5.6/controllers#resource-controllers
class PostController extends Controller
{
    use \imageProcessing;
    private $postModel = null;

    function __construct()
    {
        $this->postModel = new Post();
    }

    function index()
    {

        $categories = $this->postModel->categories();
        $posts = $this->postModel->all();
        $articles = [];

        if(!empty($posts)){
            for ($i = 0; $i < 3; $i++) {
                $article = $posts[rand(0, count($posts) - 1)];
                $articles[] = $article;
            }
        }


        return [
            'view' => 'postIndex.php',
            'data' => [
                'pageTitle' => 'liste des posts',
                'posts' => $posts,
                'articles' => $articles,
                'categories' => $categories
            ]
        ];
    }

    function category()
    {
        $categories = $this->postModel->categories();
        $cat = $_GET['cat'];
        $posts = $this->postModel->getCategoryPosts($cat);
        $about = $this->postModel->getAbout($cat);



        $articles = [];

        if(!empty($posts)){
            for ($i = 0; $i < 3; $i++) {
                $article = $posts[rand(0, count($posts) - 1)];
                $articles[] = $article;
            }
        }

        return [
            'view' => 'postIndex.php',
            'data' => [
                'pageTitle' => 'Article about '.$cat,
                'posts' => $posts,
                'articles' => $articles,
                'categories' => $categories,
                'about' => $about
            ]
        ];
    }

    function archive(){
        $categories = $this->postModel->categories();
        $month = $_GET['month'];
        $year = $_GET['year'];

        $posts = $this->postModel->getArchives($month, $year);
        $articles = [];

        if(!empty($posts)){
            for ($i = 0; $i < 3; $i++) {
                $article = $posts[rand(0, count($posts) - 1)];
                $articles[] = $article;
            }
        }

        return [
            'view' => 'postIndex.php',
            'data' => [
                'pageTitle' => 'article from '.$month.' '.$year,
                'posts' => $posts,
                'articles' => $articles,
                'categories' => $categories
            ]
        ];
    }



// affiche le formulaire de creation pour un ressource

    function create()
    {
        $this->authCheck();
        $categories = $this->postModel->categories();

        return [
            'view' => 'postCreate.php',
            'data' => [
                'categories' => $categories
            ]
        ];
    }




//enrigstre la ressource dans la base de donnée
//apres il y aura une redirection

    function store()
    {
        $this->authCheck();

        if (!isset($_POST['title']) || !isset($_POST['content'])) {
            header('Location: index.php?a=index&r=post');
            exit;
        }

        $title = $_POST['title'];
        $category = $_POST['category'];
        $createBy = $_SESSION['user']->name;
        $content = $_POST['content'];
        $desc = $_POST['desc'];
        /*$tmp_name = $_FILES['image']['tmp_name'];
        $format = explode('.', $_FILES['image']['name']);
        $imgFile = 'i' . base_convert(time() + rand(0, time()), 10, 36) . '.' . $format[count($format) - 1];
        if (!move_uploaded_file($tmp_name, ASSETS_DIR . '/' . $imgFile)) {
            header('Location: index.php?a=create&r=post');
            exit;
        }
        $resizedImageFile = $this->resize(ASSETS_DIR . '/' . $imgFile);*/


        $id = $this->postModel->storePost($category, $title, $createBy, $desc, $content);


        header('Location: index.php?a=index&r=post');
        exit;

    }


// affiche une ressource par rapport a un identifiant

    function show()
    {
        $categories = $this->postModel->categories();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
        $id = $_GET['id'];


        $post = $this->postModel->find($id);

        return [
            'view' => 'postShow.php',
            'data' => [
                'pageTitle' => $post->title,
                'post' => $post,
                'categories' => $categories
            ]
        ];
    }


// afficher le formulaire d'edition par rapport a un identifiant

    function edit()
    {
        $categories = $this->postModel->categories();
        $this->authCheck();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) return false;
        $id = $_GET['id'];


        $post = $this->postModel->find($id);

        return [
            'view' => 'postEdit.php',
            'data' => [
                'post' => $post,
                'categories' => $categories
            ]
        ];
    }


// modifier une ressource dans la base de donnée par rapport a un identifiant

    function update()
    {
        $this->authCheck();
        if (!isset($_POST['id']) ||
            !ctype_digit($_POST['id']) ||
            !isset($_POST['title']) ||
            !isset ($_POST['content'])) {
            header('Location: index.php?a=index&r=post');
            exit;

        }

        $id = $_POST['id'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $desc = $_POST['desc'];
        $this->postModel->updatePost($id, $category, $title, $desc, $content);

        header('Location: index.php?a=index&r=post');

    }

    function confirmDelete()
    {
        $categories = $this->postModel->categories();
        $this->authCheck();
        if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
            return false;
        }
        $id = $_GET['id'];
        $post = $this->postModel->find($id);

        return [
            'view' => 'postConfirmDelete.php',
            'data' => [
                'post' => $post,
                'categories' => $categories
            ]
        ];

    }


// supprime un element de la base de donnée

    function destroy()
    {
        $this->authCheck();
        if (!isset($_POST['id']) || !ctype_digit($_POST['id'])) {
            return false;
        }
        $id = $_POST['id'];
        $this->postModel->deletePost($id);
        header('Location: index.php?a=index&r=post');
        exit;
    }


    function userPage()
    {
        $categories = $this->postModel->categories();
        $this->authcheck();
        $user = $_SESSION['user']->name;



        $posts = $this->postModel->getUserPosts($user);

        return [
            'view' => 'postUserPage.php',
            'data' => [
                'posts' => $posts,
                'categories' => $categories
            ]

        ];
    }



    function adminPage()
    {

        $categories = $this->postModel->categories();
        $this->authcheck();
        if(!$_SESSION['user']->id === '3'){
            header('location:index.php?a=index&r=post');
        }


        $posts = $this->postModel->all();

        return [
          'view' => 'postAdminPage.php',
          'data' => [
              'posts' => $posts,
              'categories' => $categories
    ]
        ];
    }


    function removeCat(){
        $this->authcheck();

        $name = $_POST['removeCat'];

        $this->postModel->removeCat($name);

        header('Location: index.php?a=adminPage&r=post');
        exit;

    }

    function addCat(){
        $this->authcheck();

        $name = $_POST['addCat'];

        $this->postModel->addCat($name);

        header('Location: index.php?a=adminPage&r=post');
        exit;
    }

    function changeAbout(){
        $this->authCheck();

        $name = $_POST['category'];
        $about = $_POST['about'];

        $this->postModel->changeAbout($name, $about);

        header('Location: index.php?a=adminPage&r=post');
        exit;
    }


    function nuke()
    {
        //authCheck();
        $this->postModel->nukePosts();
        echo 'The end of the FUCKING world !';
        exit;
    }
}

// la liste des posts











