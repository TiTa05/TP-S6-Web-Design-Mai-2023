<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\article;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{

    public function index()
    {
       return view('user/Acceuill_user');
    }


     public function liste(Request $request)
     {
         $articleAdmin = Article::whereNull('auteur')->get();
        $articleUser = Article::whereNotNull('auteur')->get();
        $recentAdminArticles = Article::whereNull('auteur')->orderBy('date_publication', 'desc')->take(3)->get();
        $recherche = null;
        if ($request->has('recherche')) {
            $recherche = Article::whereRaw('LOWER(titre) LIKE ?', [strtolower("%{$request['recherche']}%")])->get();
        } 

       return view('user/ListeArticle_user',[
        'listeAdminArticle' => $articleAdmin,
        'listeUserArticle' => $articleUser,
        'recentAdminArticles' => $recentAdminArticles,
        'recherche' => $recherche,
       ]);
     }    


    public function insererArticle(Request $request)
     {
        $data = $request->request->all();
        $split_result = preg_split('#(?<=[^A-Z].[.?]) +(?=[A-Z])#',$data['description']);
        $data['resumer'] = reset($split_result);
     
        article::create($data);
        return redirect("/liste");     
     }
     //Avec cache
    //  public function ArticleComplet(){

    //     $url = request('id');
    //     $tab = array();
    //     $tab = explode("-", $url);
    //     $firstDigit = $tab[0];
    //     $article = Cache::remember('Article_'.$firstDigit, 60, function () use ($firstDigit){
    //         return Article::find( $firstDigit);
    //     });
    //     $response = response()->view('user/ArticleComplet', [
    //         'article'=>$article,
    //     ]);
    //     $response->header('Cache-Control','max-age=3600, public');
    //     return $response;
    //  }
     //Sans cache

     public function ArticleComplet(){

        $url = request('id');
        $tab = array();
        $tab = explode("-", $url);
        $firstDigit = $tab[0];
        $article = Article::find( $firstDigit);
        return view('user/ArticleComplet',[
            'article' => $article,
        ]);
     }

     
}
