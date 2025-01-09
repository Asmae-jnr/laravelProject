<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointement;

class HomeController extends Controller
{
    public function redirect()
    {
        // Vérifie si l'utilisateur est connecté
        if (Auth::id()) {
            // Vérifie si le type d'utilisateur (usertype) est égal à '0' (utilisateur standard)
            if (Auth::user()->usertype == '0') {
                // Si c'est un utilisateur standard, affiche la vue 'user.home'
                return view('user.home');
            } else {
                // Sinon, affiche la vue 'admin.home' (pour les administrateurs)
                return view('admin.home');
            }
        } else {
            // Si l'utilisateur n'est pas connecté, le renvoie à la page précédente
            return redirect()->back();
        }
    }
    
    
    public function index(){
        return view('user.home');
    }

    public function appointement(Request $request){
        $data = new appointement;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->status = 'In progress';
        if(Auth::id()){
            $data->user_id=Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message','Appointement request Successful . We will contact you soon');
    }

    public function myappointment(){

	    if(Auth::id()){

            $userid=Auth::user()->id;
            $appoint=appointement::where('user_id',$userid)->get();

	    	return view('user.my_appointment',compact('appoint'));
	    }
	
	    else{
	    	return redirect()->back();
	    }
    }

    public function cancel_appoint($id){
        $data=appointement::find($id);
        $data->delete();
        return redirect()->back();
    }
}
