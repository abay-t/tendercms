<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Portal;
use App\Tip;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }


    public function admin()
    {
    	$users = DB::table('users')->paginate(15);

        return view('admin.index', ['users' => $users]);
    }

    public function tenders(){
    	$tenders = DB::table('tenders')->paginate(15);
        foreach ($tenders as $key => $tender) {
            if(Carbon::parse($tender->finishTime)->gt(Carbon::now()))
                $tender->finishTime = Carbon::parse(Carbon::now())->diffInDays($tender->finishTime);
            else
                $tender->finishTime = 0;
        }
        $portals = Portal::all();
        $tips = Tip::all();
    	return view('admin.tenders', ['tenders' => $tenders, 'portals' => $portals, 'tips' => $tips]);
    }

    public function contracts(){
        $tenders = DB::table('tenders')->where('won', 1)->paginate(15);
        foreach ($tenders as $key => $tender) {
            $dogovorDate = new Carbon($tender->dogovorDate);
            $finishForDelivery = $tender->finishForDelivery;
            $srok = $dogovorDate->addDays($finishForDelivery);
            if(Carbon::parse($srok)->gt(Carbon::now()))
                $tender->finishTime = Carbon::parse($srok)->diffInDays(Carbon::now());
            else
                $tender->finishTime = 0;
        }

        return view('admin.contracts', ['tenders' => $tenders]);
    }

    public function portals(){
        $portals = DB::table('portals')->paginate(15);
        $name = 'portal';
        return view('admin.portals', ['portals' => $portals, 'name' => $name]);
    }
    public function predmets(){
        $portals = DB::table('predmets')->paginate(15);
        $name = 'predmet';
        return view('admin.portals', ['portals' => $portals, 'name' => $name]);
    }
    public function tips(){
        $portals = DB::table('tips')->paginate(15);
        $name = 'tip';
        return view('admin.portals', ['portals' => $portals, 'name' => $name]);
    }

    public function edituser($id){
    	$user = User::find($id);
    	return view('admin.edituser', ['user' => $user]);
    }

    public function updateuser($id){
    	$user = User::find($id);
    	$this->validate(request(), [
            'email' => 'unique:users,email,'.$user->id,
            'password' => 'confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        if(request('password') != null)
        	$user->password = bcrypt(request('password'));
        $user->organization = request('organization');
        $user->bin = request('bin');
        $user->dolzhnost = request('dolzhnost');
        $user->address = request('address');
        $user->contact = request('contact');

        if (file_exists(request('rekvizit'))) {
            $file = request('rekvizit');
            $name = date("Y-m-d-H-i-s").request('rekvizit')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['rekvizit' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('svidetelstvo'))) {
            $file = request('svidetelstvo');
            $name = date("Y-m-d-H-i-s").request('svidetelstvo')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['svidetelstvo' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('nds'))) {
            $file = request('nds');
            $name = date("Y-m-d-H-i-s").request('nds')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['nds' => '/public/uploads/user/'.$name]);
        }
        if (file_exists(request('ustav'))) {
            $file = request('ustav');
            $name = date("Y-m-d-H-i-s").request('ustav')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['ustav' => '/public/uploads/user/'.$name]);
        }

        if (file_exists(request('prikaz'))) {
            $file = request('prikaz');
            $name = date("Y-m-d-H-i-s").request('prikaz')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['prikaz' => '/public/uploads/user/'.$name]);
        }

        if (file_exists(request('reshenie'))) {
            $file = request('reshenie');
            $name = date("Y-m-d-H-i-s").request('reshenie')->getClientOriginalName();
            
            $file->move(getcwd().'/public/uploads/user/', $name);
            $user->update(['reshenie' => '/public/uploads/user/'.$name]);
        }

        $user->save();
        return redirect('admin/users')->with('message', 'Ползователь обновлен');
    }

    public function deleteuser($id){
    	$user = User::find($id);    
		$user->delete();
		return redirect()->back()->with('message', 'Ползователь удален');
    }

    public function search(Request $request){

        if($request->submitted == 'on'){
            $submitted = 1;
        }
        else
            $submitted = 0;


        $tenders = DB::table('tenders')->where('submitted', $submitted);
        if($request->title != null){
            $tenders->where('title', 'LIKE', '%'.$request->title.'%');
        }

        if($request->no != null){
            $tenders->where('no', $request->no);
        }

        if($request->portal != null){
            $tenders->where('portal', $request->portal);
        }

        if ($request->tip != null) {
            $tenders->where('type', $request->tip);
        }

        $tenders = $tenders->paginate(15);
        $portals = Portal::all();
        $tips = Tip::all();
        $search = 'Результаты поиска';
        return view('admin.tenders', ['tenders' => $tenders, 'portals' => $portals, 'tips' => $tips, 'request' => $request, 'search' => $search]);                               
    }

    public function price(){
        $tenders = DB::table('tenders')->orderBy('sum')->paginate(15);
        foreach ($tenders as $key => $tender) {
            if(Carbon::parse($tender->finishTime)->gt(Carbon::now()))
                $tender->finishTime = Carbon::parse(Carbon::now())->diffInDays($tender->finishTime);
            else
                $tender->finishTime = 0;
        }
        $portals = Portal::all();
        $tips = Tip::all();
        return view('admin.tenders', ['tenders' => $tenders, 'portals' => $portals, 'tips' => $tips]);
    }

    public function date(){
        $tenders = DB::table('tenders')->orderBy('finishTime')->paginate(15);
        foreach ($tenders as $key => $tender) {
            if(Carbon::parse($tender->finishTime)->gt(Carbon::now()))
                $tender->finishTime = Carbon::parse(Carbon::now())->diffInDays($tender->finishTime);
            else
                $tender->finishTime = 0;
        }
        $portals = Portal::all();
        $tips = Tip::all();
        return view('admin.tenders', ['tenders' => $tenders, 'portals' => $portals, 'tips' => $tips]);
    }

    public function margin(){
        $tenders = DB::table('tenders')->orderBy('margin')->paginate(15);
        foreach ($tenders as $key => $tender) {
            if(Carbon::parse($tender->finishTime)->gt(Carbon::now()))
                $tender->finishTime = Carbon::parse(Carbon::now())->diffInDays($tender->finishTime);
            else
                $tender->finishTime = 0;
        }
        $portals = Portal::all();
        $tips = Tip::all();
        return view('admin.tenders', ['tenders' => $tenders, 'portals' => $portals, 'tips' => $tips]);
    }
}
