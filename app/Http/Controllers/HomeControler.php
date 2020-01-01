<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,App\Duan,App\Ads;
class HomeControler extends Controller
{
    public function index(){
        $duan = DB::table('du_an')->latest()->limit(3)->get();
        $user = DB::table('users')->latest()->get();
        $baidang = DB::table('ads')->orderBy('created_at','desc')->limit(12)->get();
        return view('site.index',['duans'=>$duan,'baidangs'=>$baidang,'users'=>$user]);
    }
    public function search(Request $request)
    {
        if ($request->cat == 'duan') {
            if ($request->keyword != '') {
                $data = Duan::FullTextSearch('tieu_de', $request->keyword)->get()->toArray();
                return response()->json($data);
            }
        }else{
            if ($request->keyword != '') {
                $data = Ads::FullTextSearch('tieu_de', $request->keyword)->get()->toArray();
                return response()->json($data);
            }
        }
        // return response()->json($request);
    }
}
