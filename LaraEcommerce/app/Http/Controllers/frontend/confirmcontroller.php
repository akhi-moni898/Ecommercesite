<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
 use App\Models\User;
class confirmcontroller extends Controller
{
   public function confirm($token)
   {
   	
           $user =User::where('remember_token',$token)->first();

        if (count<0($user)) {

        	 $user ->status =1;
        	 $user->remember_token =Null;
        	
        	 $user->save();

           session()->flash('success','you are registered');
           return redirect('login');
        }else
        {
        	 session()->flash('errrors','you are not registered');
           return redirect('/');
        }

          
   }
}
