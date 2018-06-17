<?php

namespace Blog\Models;


class Post extends Model
{
    function all()
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts ORDER BY date DESC';
        $pst = $cx->query($sql);
        return $pst->fetchAll();

    }

    function categories(){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM category';
        $pst = $cx->query($sql);
        return $pst->fetchAll();

    }

    function getCategoryPosts($cat)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE category = :category ORDER BY date DESC';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $cat]);
        return $pst->fetchAll();
    }

    function getAbout($cat){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT about FROM category WHERE name = :category';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $cat]);
        return $pst->fetch();
    }

    function getArchives($month, $year){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE (SELECT DISTINCT EXTRACT(MONTH FROM date) FROM posts) = :month AND (SELECT DISTINCT EXTRACT(YEAR FROM date) FROM posts) = :year ORDER BY date DESC';
        $pst = $cx->prepare($sql);
        $pst->execute([':month' => $month, ':year' => $year]);
        return $pst->fetchAll();
    }

    function find($id)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':id' => $id]);
        return $pst->fetch();
    }

    function storePost($category, $title, $createBy, $desc, $content)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'INSERT INTO posts(`category`,`title`,`date`,`create_by`, `description`, `content`) VALUES(:category, :title, CURRENT_DATE, :create_by, :desc,  :content)';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $category, ':title' => $title, ':create_by' => $createBy,':desc' => $desc, ':content' => $content]);
        return $cx->lastInsertId();
    }

    function updatePost($id, $category, $title, $desc, $content)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE posts SET category = :category, title = :title, content = :content, description = :desc WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':category' => $category, ':title' => $title, ':content' => $content,':desc' => $desc , ':id' => $id]);
    }

    function deletePost($id)
    {
        $cx = $this->getConnectionToDb();
        $sql = 'DELETE FROM posts WHERE id = :id';
        $pst = $cx->prepare($sql);
        $pst->execute([':id' => $id]);

    }


    function getUserPosts($user){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT * FROM posts WHERE create_by = :user';
        $pst = $cx->prepare($sql);
        $pst->execute([':user' => $user]);
        return $pst->fetchAll();
    }


    function removeCat($name){
        $cx = $this->getConnectionToDb();
        $sql = 'DELETE FROM category WHERE name = :name';
        $pst = $cx->prepare($sql);
        $pst->execute([':name' => $name]);
    }

    function addCat($name){
        $cx = $this->getConnectionToDb();
        $sql = 'INSERT INTO category(`name`) VALUES(:name)';
        $pst = $cx->prepare($sql);
        $pst->execute([':name' => $name]);
    }

    function changeAbout($name, $about){
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE category SET about = :about WHERE name = :name';
        $pst = $cx->prepare($sql);
        $pst->execute([':about' => $about, ':name' => $name]);
    }

    function getusers(){
        $cx = $this->getConnectionToDb();
        $sql = 'SELECT name FROM users';
        $pst = $cx->query($sql);
        return $pst->fetchAll();
    }

    function toggleAdmin($choice, $name){
        $cx = $this->getConnectionToDb();
        $sql = 'UPDATE users SET admin = :choice WHERE name = :name';
        $pst = $cx->prepare($sql);
        $pst->execute([':choice' => $choice, ':name' => $name]);
    }

    function nukePosts()
    {
        $cx = $this->getConnectionToDb();
        $sql = 'TRUNCATE TABLE blog.posts';
        $cx->query($sql);
    }
}




