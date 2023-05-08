<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\article;
use App\information;
use Illuminate\Support\Facades\Cache;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin/Admin_index');
    }

    //login admin
    public function log_admin(Request $request)
    {
        //login
        $login = Admin::loggin(request('mail'), request('mdp'));
        if ($login == 0) {
            return view('admin/Admin_index', [
                'erreur' => 'Email ou mot de passe errone',
            ]);
        } else {
            return redirect('/addArticle');
        }
    }

    public function delog_admin()
    {
        return redirect('/');
    }


    public function insererArticle(Request $request)
    {
        $data = $request->request->all();
        $split_result = preg_split('#(?<=[^A-Z].[.?]) +(?=[A-Z])#', $data['description']);
        $data['resumer'] = reset($split_result);

        article::create($data);
        return redirect("/addArticle");
    }

    /*public function lister()
    {
        $bloc = 5;
        // Récupérer le numéro de page et le nombre d'éléments par page
        $page = request()->query('page', 1); // Valeur par défaut : 1
        $perPage = request()->query('perPage', $bloc); // Valeur par défaut : 10
        $currentPage = 1;

        $liste = article::orderBy("id", "asc")->paginate($perPage, ['*'], 'page', $page);

        $lastPage = $liste->lastPage();

        $listeNumeroPage = range(1, $lastPage);


        return view('admin/liste', [
            'liste' => $liste,
            'currentPage' => $currentPage,
            'lastPage' => $lastPage,
            'listeNumeroPage' => $listeNumeroPage,
        ]);
    } 

    public function pagination()
     {
      $bloc = 5;
              // Récupérer le numéro de page et le nombre d'éléments par page
      $page = request()->query('page',request('numero')); // Valeur par défaut : 1
      $perPage = request()->query('perPage',$bloc); // Valeur par défaut : 10
      $currentPage = request('numero');
      
      $liste = article::orderBy("idarticle", "asc")->paginate($perPage, ['*'], 'page', $page);

      $lastPage = $liste->lastPage(); 
  
      $listeNumeroPage = range(1, $lastPage);
      
      return view("admin/liste",[
            'liste' => $liste,
            'currentPage' => $currentPage,
            'lastPage'  =>  $lastPage,
            'listeNumeroPage' => $listeNumeroPage,
        ]);
     }


    public function VersupdateAll()
    {
        $url = request('id');
        $tab = array();
        $tab = explode("-", $url);
        $id = $tab[count($tab)-2];
        $valeur = article::find($id)->first();
        return view('admin/updateArticle',
        [
              'valeur' => $valeur,
        ]);
    }
       
    public function updateAll(Request $request)
    {
    $data = $request->all();
    $item = article::find(request('id'));
    if (!$item) {
        return response()->json(['message' => 'Item not found'], 404);
    }
    $item->update($data);
    return redirect("lister");      
    }

   public function delete(Request $request)
   {
    $url = request('idarticle');
    $tab = array();
    $tab = explode(".", $url);
    $idarticle = $tab[count($tab)-3];
    $id = article::find($idarticle);
    $id->delete();
    return redirect("lister");  
   }

   public function recherche(Request $request)
   {
       $query = "SELECT * FROM articles";
       $bindings = array();
       if (null!==$request->input('titre')) {
           $query .= (count($bindings) > 0 ? " AND" : " WHERE") . " titre like ?";
           $bindings[] = "%" . $request->input('titre') . "%";
       }

       if (null!==$request->input('date1')) {
           $query .= (count($bindings) > 0 ? " AND" : " WHERE") . "  datepublication >= ?";
           $bindings[] = $request->input('date1') ;
       }
       
       if (null!==$request->input('date2')) {
           $query .= (count($bindings) > 0 ? " AND" : " WHERE") . " datepublication <= ?";
           $bindings[] =  $request->input('date2') ;
       }
       
       
       $results = \DB::select($query, $bindings);
       $lastPage = 5; 
       $listeNumeroPage = range(1, $lastPage);
       $currentPage = 1;
       return view('admin/liste',[
           'liste' => $results,
           'lastPage' => $lastPage,
           'listeNumeroPage' => $listeNumeroPage,
           'currentPage' => $currentPage,
       ]);
   }


   public function info()
   {
       return view('admin/information');
   } */

    public function addArticle(Request $request)
    {
        $articleAdmin = Article::whereNull('auteur')->get();
        $articleUser = Article::whereNotNull('auteur')->get();

        $recherche = null;
        if ($request->has('recherche')) {
            $recherche = Article::whereRaw('LOWER(titre) LIKE ?', [strtolower("%{$request['recherche']}%")])->get();
        }

        return view('admin/AddArticle', [
            'listeAdminArticle' => $articleAdmin,
            'listeUserArticle' => $articleUser,
            'recherche' => $recherche,
        ]);
    }

}
