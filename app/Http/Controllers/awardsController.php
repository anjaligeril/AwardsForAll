<?php

namespace App\Http\Controllers;

use App\Award;
use App\User;
use Illuminate\Cache\ApcWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class awardsController extends Controller
{

    /*show all the users*/
    public function addAwards($id){
        $user=User::find($id);
        $username=$user->name;

        return view('addAwards')->with(['username'=>$username,'id'=>$id]);
    }
/*add the new award to database*/
public function addNewAwards($id){
    $user=$id;
    $award=$_POST['award'];
    $description=$_POST['description'];
    if(!empty($user) && !empty($award)&&!empty($description))
    {
        $newAward=new Award();
        $newAward ->user_id=$user;
        $newAward->award=$award;
        $newAward->description=$description;
        $newAward->save();
        $awards=Award::all();
        return  redirect('dashboard')->with (['success'=>'Award added successfully','allAwards'=>$awards]);
    }
    else{
        return back()->with ('error','Invalid input.Please fill all fields...');
    }
}

/*delete the award*/
public function deleteAward($id){
        Award::destroy($id);
    $awards=Award::all();
    return  back()->with (['error'=>'Award deleted successfully','allAwards'=>$awards]);
}
/*update award details to database*/
    public function updateAward($id){
        $award=$_POST['award'];
        $description=$_POST['description'];
        if( !empty($award)&&!empty($description))
        {
            $newAward=Award::find($id);

            $newAward->award=$award;
            $newAward->description=$description;
            $newAward->save();
            $awards=Award::all();
            return redirect('dashboard')->with (['success'=>'Award updated successfully','allAwards'=>$awards]);
        }
        else{
            return redirect('dashboard')->with ('error','Invalid input.Please fill all fields...');
        }
    }
/*search the awards*/
    public function searchAwards(){
        $id=Auth::user()->id;
        $detail=$_POST['detail'];
        $selectedAwards=Award::where('user_id','$id')->where('award', 'like','%'.$detail.'%')->orwhere('description', 'like','%'.$detail.'%')->orwhere('description', 'like','%'.$detail.'%')->get();
        return back()->with ('allAwards',$selectedAwards);
    }

    /*show all awards*/
    public function showAllAwards(){
        $allawards=Award::all();
        return redirect('welcome')->with('allAwards',$allawards);
    }
/*update page display*/
    public function updateAwardsInfo($id){
        $singleAward=Award::find($id);
        return view('updateAwardsInfo')->with('singleAward',$singleAward);
    }
}
