<?php
require_once 'config/render.php';
require_once 'models/ForumModel.php';
require_once 'models/UserModel.php';

class ForumController
{
    public function index(){
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        render('onglets/forum/index', 'Forum', compact('user'));
    }

    public function all(){
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        $forums = (new ForumModel()) -> getAll();
        render('onglets/forum/all', 'Forum', compact('user', 'forums'));
    }
    public function create(){
        if($_POST){
            session_start();
            $titre = $_POST['titre'];
            $text = $_POST['textarea-forum'];

            (new ForumModel())->create($_SESSION['id'], $titre, $text);
            render('onglets/forum/index', 'Forum');

        }else{
            render('onglets/forum/index', 'Forum');
        }
    }

    public function delete(){
        if($_POST){
            $id = $_POST['id'];
            (new ForumModel())->delete($id);
            render('onglets/forum/index', 'Forum');
        }else{
            render('onglets/forum/index', 'Forum');
        }
    }

    public function check($id){
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        $forum = (new ForumModel()) -> get($id);

        $answers = (new ForumModel()) -> getAllAnswer($forum['id']);
        render('onglets/forum/check', 'Forum', compact('user', 'forum', 'answers'));
    }

    public function answer($forum_id){
        session_start();
        $user_id = $_SESSION['id'];

        $user = (new UserModel()) -> getUserWithAccount($user_id);

        // answering
        $answer = $_POST['answer'];

        $answering = (new ForumModel()) -> answerForum($forum_id, $answer, $user['id']);

        //inrementing the number of comment
        if($answering){
            (new ForumModel()) -> incrementComment($forum_id);
        }
        $forum = (new ForumModel()) -> get($forum_id);

        $answers = (new ForumModel()) -> getAllAnswer($forum_id);
        render('onglets/forum/check', 'Forum', compact('user', 'forum', 'answers'));
    }


}