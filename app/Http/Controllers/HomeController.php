<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Catalog;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getPostsbyAuthor($id)
    {
        $posts=Post::all()->where('author_id',$id)->first();
        if($posts!=null){
            return response()->json( [
                "status" => 1,
                "data" => $posts
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новостей по этому автору"
            ]);
        }
    }
    public function getPostsbyCatalog($id)
    {
        $posts=Catalog::all()->where('id',$id)->first()->posts()->get()->toArray();

        if($posts!=null){
            return response()->json( [
                "status" => 1,
                "data" => $posts
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новостей по этой рубреке"
            ]);
        }
    }
    public function getAllAuthors(){
        $authors=Author::all()->toArray();
        if($authors!=null){
            return response()->json( [
                "status" => 1,
                "data" => $authors
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету авторов"
            ]);
        }
    }
    public function getInfoPostById($id){
        $post =Post::all()->where('id',$id)->first();
        if($post!=null){
            return response()->json( [
                "status" => 1,
                "data" => $post
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новости по этому индетификатору"
            ]);
        }
    }
    public function getPostByCatalogId($id){
        $posts=Catalog::all()->where('id',$id)->first()->posts()->get()->toArray();
        $catalogs=Catalog::all()->where('parent_id',$id)->all();
        $posts2=[];
        foreach ($catalogs as $catalog){


            $posts=array_merge($catalog->posts()->get()->toArray(),$posts);

        }
        $smth=array_merge($posts,$posts2);
        if($posts!=null){
            return response()->json( [
                "status" => 1,
                "data" => $posts
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новостей по этому рубреке"
            ]);
        }
    }
    public function getPostByName($name){
        $post=Post::all()->where('title',$name)->toArray();
        if($post!=null){
            return response()->json( [
                "status" => 1,
                "data" => $post
            ]);
        }else {
            return response()->json([
                "status" => 0,
                "data" => "Нету новостей по этому имени"
            ]);
        }
    }
}
