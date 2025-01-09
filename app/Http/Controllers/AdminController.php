<?php

namespace App\Http\Controllers;
use App\Models\Appointement;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showappointment(){
        $data=appointement::all();

        return view('admin.showappointment', compact('data'));
    }

    public function showusers(){
        $data=user::all();
        $data = User::with('appointments')->get(); // Charge chaque utilisateur avec ses rendez-vous
        return view('admin.showusers', compact('data'));
    }

    public function approved($id){

        $data=appointement::find($id);
        
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function canceled($id){

        $data=appointement::find($id);
        
        $data->status='canceled';
        $data->save();
        return redirect()->back();
    }

    public function deleteuser($id){
        $data=user::find($id);
        
        $data->delete();
        return redirect()->back();
    }

    public function updateuser($id){
        $data=user::find($id);
        $data = user::with('appointments')->find($id); // Charge l'utilisateur avec son rendez-vous associé
        return view('admin.updateuser', compact('data'));
    }

    public function edituser(Request $request, $id){
        $user = user::find($id);
        
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;

        $user->save();
            // Vérifiez s'il existe un rendez-vous lié à cet utilisateur
    if ($user->appointement) {
        $appointement = $user->appointement;
        $appointement->time = $request->time;
        $appointement->save();
    }
        return redirect()->back();
    }
}
