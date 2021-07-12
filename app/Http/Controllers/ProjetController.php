<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Projet;
use App\Mail\NewProjectMail;
use Illuminate\Http\Request;
use App\Mail\NewFinancingMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    public $idu;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function pay($montant){
      $url="http://money_service.local?number=".Auth::user()->telephone."&benef=12345&amount=$montant";
      $pay=@json_decode(file_get_contents($url));
      if($pay->status){
          return true;
      }else{
          return false;
      }
    }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function financerprojet($id,Request $request)
    {
        $request->validate([
            'montant'=>'required|integer',
        ]);
        $projet=Projet::where("id",$id)->get();
        if($this->pay($request->montant)){
          DB::insert('insert into projet_user (user_id,projet_id,montant,message,created_at,updated_at) values (?,?,?,?,?,?)', [Auth::user()->id,$id,$request->montant,$request->message,now(),now()]);
            //Auth::user()->cours()->toggle([$course->id]);
        }

      Mail::to($projet[0]->user->email)->send(new NewFinancingMail($projet[0],$request->montant,Auth::user()));
      return redirect(route("campagnes",
              ["projets"=>Projet::
                    where("duree",">=",now())
                  ->where("etat",1)
                  ->get()]));
    }

    public function financerview($id)
    {
          return view('interfaces.template.financer',["projet"=>Projet::where("id",$id)->get()]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nom'=>'required|string|max:100',
            'slogan'=>'string|max:100',
            'objectif'=>'required|numeric',
            'duree'=>'required|date',
            'description'=>'string',
            'categorie'=>'required|numeric',
            'image'=>'image',

        ]);

         function projetimg(Request $request){
            return $request->image?Storage::disk("public")->put("projets",$request->image):"projets/default.png";
        }
        $projetinfo=Projet::create([
            'nom'=>$request->nom,
            'slogan'=>$request->slogan,
            'objectif'=>$request->objectif,
            'duree'=>$request->duree,
            'description'=>$request->description,
            'image'=>projetimg($request),
            'user_id'=>Auth::user()->id,
            'categorie_id'=>$request->categorie,
        ]);

        foreach(User::where("role","admin")->where("etat",1)->get("email") as $admin){
          Mail::to($admin->email)->send(new NewProjectMail($projetinfo));
        }
        return redirect(route("campagnes",
        ["projets"=>Projet::
              where("duree",">=",now())
            ->where("etat",1)
            ->get()]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(projet $projet)
    {
        //
    }

    /**
     * Display the specified project.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function showSingle($projet)
    {
        return view('interfaces.template.project',["projet"=>Projet::where("id",$projet)->firstOrFail()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(projet $projet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projet $projet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(projet $projet)
    {
        //
    }
}
