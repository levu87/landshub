<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request,
Auth,
App\Ads,
App\User,
App\Duan,
Validator,DB,
App\ads_gallery;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banindex()
    {
        $ban = Ads::where('danh_muc',1)->paginate(6);
        $users = User::latest()->get();
        return view('site.ban.ban',['bans'=> $ban,'user'=> $users]);
    }


    public function thueindex()
    {
        $thue = Ads::where('danh_muc',0)->paginate(6);
        $users = User::latest()->get();
        return view('site.thue.thue',['thues'=> $thue,'user'=> $users]);
    }
    // quản lý tin bán
    public function quanlytin()
    {
        $id_user = Auth::id();
        $data = Ads::where('user_id', $id_user)
        ->where( function ( $query )
        {
            $query->where( 'hide', '=', '0' );
        })
        ->orderBy('created_at','desc')
        ->paginate(5);
        return view('site.baidang.tin-ban',['posts'=>$data]);
    }
    public function adminquanly()
    {
        // $ads = Ads::latest()->get();
        $ads = DB::table('ads')->where( 'hide', '=', '0' )
        ->join('users','ads.user_id','=','users.id')
        ->select('ads.*','users.name')->latest()->get();
        return view('admin.baidang.index',['adss'=>$ads]);
    }
    public function adminduyet($id)
    {
       $ads = Ads::find($id);
       $ads->public = 1;
       $ads->save();
       return redirect()->route('ad-bai-dang')->with('success','Đã duyệt '.$ads->tieu_de);
    }
    public function taotinbanb1(){
        $data = Duan::where('public',0)->get();
        return view('site.baidang.tao-tin-ban-b1',['du_an_items'=>$data]);
    }
    public function luutinbanb1(Request $request){
        $ads = new Ads();
        $img =$request->anh_dai_dien;
        $fileName ='';
        if ($request->hasFile('anh_dai_dien')) {
        $folderDir = 'public/uploads/images/';
        $destinationPath = base_path() . '/' . $folderDir;
        $extension = $img->getClientOriginalExtension(); 
        $fileName = '/uploads/images/'.rand() . '.' . $extension; 
        $img->move($destinationPath, $fileName); 
        }
        $ads->tieu_de=  $request->title;
        $ads->gia=      $request->price;
        $ads->don_vi=   $request->don_vi;
        $ads->dien_tich=0;
        $ads->slug='';
        $ads->mo_ta_ngan='';
        $ads->bai_viet='';
        $ads->danh_muc=$request->danh_muc;
        $ads->id_du_an=$request->du_an;
        $ads->dia_chi=$request->dia_chi;
        $ads->lat=$request->latitude;
        $ads->lng=$request->longitude;
        $ads->user_id=$request->id_user;
        $fileName == ''?:$ads->anh_dai_dien=$fileName;
        $ads->save();
        $request->session()->put('ads_id', $ads->id);
        return redirect('/tao-tin-ban-b2');
    }
    public function taotinbanb2()
    {
       return view('site.baidang.tao-tin-ban-b2');
    }
    public function luutinbanb2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bai_viet' => 'required',
        ]);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
        $summernote = Ads::find(session('ads_id'));
        $summernote->bai_viet =$request->bai_viet;
        $summernote->mo_ta_ngan = $request->mo_ta_ngan;
        $summernote->save();
        return redirect('/quan-ly-tin');
    }
    public function suatinbanb1($id){
        $data = Duan::where('public',0)->get();
        $ads = Ads::find($id);
        return view('site.baidang.sua-tin-ban-b1',['du_an_items'=>$data,'ads'=>$ads]);
    }
    public function luusuatinbanb1(Request $request){
        $ads = Ads::find($request->ads_id);
        $img =$request->anh_dai_dien;
        $fileName ='';
        if ($request->hasFile('anh_dai_dien')) {
        $folderDir = 'public/uploads/images/';
        $destinationPath = base_path() . '/' . $folderDir;
        $extension = $img->getClientOriginalExtension(); 
        $fileName = '/uploads/images/'.rand() . '.' . $extension; 
        $img->move($destinationPath, $fileName); 
        }
        $ads->tieu_de = $request->title;
        $ads->gia=$request->price;
        $ads->don_vi=$request->don_vi;
        $ads->dien_tich=0;
        $ads->status= $request->tinh_trang;
        $ads->danh_muc=$request->danh_muc;
        $ads->id_du_an=$request->du_an;
        $ads->dia_chi=$request->dia_chi;
        $ads->lat=$request->latitude;
        $ads->lng=$request->longitude;
        $ads->user_id=$request->id_user;
        $fileName == ''?:$ads->anh_dai_dien=$fileName;
        $ads->save();
        return redirect()->route('sua-tin-ban-b2', ['id' => $request->ads_id]);
    }
    public function suatinbanb2($id){
        $images = ads_gallery::where('ads_id',$id)->get()->toArray();
        $ads = Ads::find($id);
        return view('site.baidang.sua-tin-ban-b2',['ads'=>$ads,'images'=>$images]);
    }
    public function luusuatinbanb2(Request $request){
        $summernote = Ads::find($request->ads_id);
        $summernote->bai_viet =$request->bai_viet;
        $summernote->mo_ta_ngan = $request->mo_ta_ngan;
        $summernote->save();
        return redirect('/quan-ly-tin');
    }
    public function uploadImages(Request $request)
    { 
        $folderDir = 'public/uploads/images/';
        $destinationPath = base_path() . '/' . $folderDir;
        $destinationFileName = time() . request()->file->getClientOriginalName();
        request()->file->move($destinationPath, $destinationFileName);
        $image = new ads_gallery;
        $image->image = '/uploads/images/'. $destinationFileName;
        $image->orignal_filename =request()->file->getClientOriginalName();
        $image->ads_id = $request->id_duan;
        $image->save();
        return response()->json('ok');
    }
    public function deleteImages(Request $request){
        $image = ads_gallery::find($request->key);
        $image->delete();
        return response()->json('Đã xóa');
    }
    public function destroy(Request $request)
    {
    $ads = Ads::find( $request->del_id);
    $ads->hide= 1;
    $ads->save();
    return redirect()->route('quan-ly-tin')->with('success','Đã xóa thành công '.$ads->tieu_de);
    }
    public function destroyad(Request $request)
    {
    $ads = Ads::find( $request->del_id);
    $ads->hide= 1;
    $ads->save();
    return redirect()->route('ad-bai-dang')->with('success','Đã xóa thành công '.$ads->tieu_de);
    }

    public function singleban($id)
    {
        $data = Ads::where('ads.id',$id)->join('users', 'ads.user_id','=','users.id')
                                        ->join('du_an', 'ads.id_du_an','=','du_an.id')
        ->select('ads.*','users.name')
        
        ->get()->toArray();
        $image = ads_gallery::where('ads_id',$id)->get();
        $bai_dang =  Ads::where('id_du_an',$id)
        ->orderBy('pay',1)
        ->limit(5)->get();;
        return view('site.ban.ban-single',[
            'datas'=>$data, 
            'images'=> $image,
            'baidangs'=>$bai_dang
            ]);
    }
    public function singlethue($id)
    {
        $data = Ads::where('ads.id',$id)->join('users', 'ads.user_id','=','users.id')
                                        ->join('du_an', 'ads.id_du_an','=','du_an.id')
        ->select('ads.*','users.name')
        
        ->get()->toArray();
        $image = ads_gallery::where('ads_id',$id)->get();
        $bai_dang =  Ads::where('id_du_an',$id)
        ->orderBy('pay',1)
        ->limit(5)->get();;
        return view('site.thue.thue-single',[
            'datas'=>$data, 
            'images'=> $image,
            'baidangs'=>$bai_dang
            ]);
    }
}
