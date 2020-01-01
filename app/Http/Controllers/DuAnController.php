<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request, 
Auth,
App\Duan,
App\du_an_gallery,
App\Ads,
Validator;

class DuAnController extends Controller
{

    public function index()
    {
        $duans = Duan::where('public',0)->latest()->get();
        return view('admin.duan.index',compact('duans'));
    }
    public function mucduan()
    {
        $data = Duan::latest()->paginate(9);
        return view('site.duan.du-an',['datas'=> $data]);
    }
    public function taoduanb1()
    {
        return view('admin.duan.tao-du-an-b1');
    }
    public function luuduanb1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tieu_de' => 'required',
            'mo_ta_ngan' => 'required',
            'dia_chi' => 'required'
        ]);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
         $duan = new Duan();
         $img = $request->anh_dai_dien;
         $fileName ='';
         if ($request->hasFile('anh_dai_dien')) {
         $folderDir = 'public/uploads/images/';
         $destinationPath = base_path() . '/' . $folderDir;
         $extension = $img->getClientOriginalExtension(); 
         $fileName = '/uploads/images/'.rand() . '.' . $extension; 
         $img->move($destinationPath, $fileName); 
        }
        $duan->tieu_de= $request->tieu_de;
        $duan->mo_ta_ngan=$request->mo_ta_ngan;
        $duan->dia_chi=$request->dia_chi;
        $duan->lat=$request->latitude;
        $duan->lng=$request->longitude;
        $duan->bai_viet='';
        $duan->user_id=$request->user_id;
        $duan->anh_dai_dien=$fileName;
        $duan->save();
        $request->session()->put('duanid',$duan->id);
        return  redirect('admin/tao-du-an-b2');
    }
    public function taoduanb2()
    {
        return view('admin.duan.tao-du-an-b2');
    }
    public function luuduanb2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bai_viet' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $summernote = Duan::find($request->duanid);
        $summernote->bai_viet = $request->bai_viet;
        $summernote->save();
        return redirect('/admin/du_an');
    }
    public function suaduanb1($id)
    {
        $data= Duan::find($id);
        return view('admin.duan.sua-du-an-b1',['duan'=>$data]);
    }
    public function luusuaduanb1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tieu_de' => 'required',
            'mo_ta_ngan' => 'required',
            'dia_chi' => 'required'
        ]);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
         $duan = Duan::find($request->duan_id);
         $img = $request->anh_dai_dien;
         $fileName ='';
         if ($request->hasFile('anh_dai_dien')) {
         $folderDir = 'public/uploads/images/';
         $destinationPath = base_path() . '/' . $folderDir;
         $extension = $img->getClientOriginalExtension(); 
         $fileName = '/uploads/images/'.rand() . '.' . $extension; 
         $img->move($destinationPath, $fileName); 
        }
        $duan->tieu_de= $request->tieu_de;
        $duan->mo_ta_ngan=$request->mo_ta_ngan;
        $duan->dia_chi=$request->dia_chi;
        $duan->lat=$request->latitude;
        $duan->lng=$request->longitude;
        $duan->user_id=$request->user_id;
        $fileName ==''?:$duan->anh_dai_dien=$fileName;
        $duan->save();
        return redirect()->route('sua-du-an-b2', ['id' => $request->duan_id]);
    }
    public function suaduanb2($id)
    {
        $data= Duan::find($id);
        $images = du_an_gallery::where('du_an_id',$id)->get()->toArray();
        return view('admin.duan.sua-du-an-b2',['duan'=>$data, 'images'=>$images]);
    }
    public function luusuaduanb2(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bai_viet' => 'required',
        ]);
         if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
         }
        $summernote = Duan::find($request->duanid);
        $summernote->bai_viet = $request->bai_viet;
        $summernote->save();
        return redirect('admin/du-an');
    }
    public function uploadImages(Request $request)
    { 
        $folderDir = 'public/uploads/images/';
        $destinationPath = base_path() . '/' . $folderDir;
        $destinationFileName = time() . request()->file->getClientOriginalName();
        request()->file->move($destinationPath, $destinationFileName);
        $image = new du_an_gallery;
        $image->image = '/uploads/images/'. $destinationFileName;
        $image->orignal_filename =request()->file->getClientOriginalName();
        $image->du_an_id = $request->id_duan;
        $image->save();
        return response()->json('ok');
    }
    public function deleteImages(Request $request){
        $image = du_an_gallery::find($request->key);
        $image->delete();
        return response()->json('Đã xóa');
    }
    public function single($id)
    {
        $data = Duan::where('du_an.id',$id)->join('users', 'du_an.user_id','=','users.id')
        ->select('du_an.*','users.name')
        ->get()->toArray();
        $image = du_an_gallery::where('du_an_id',$id)->get();
        $bai_dang =  Ads::where('id_du_an',$id)
        ->orderBy('pay',1)
        ->limit(5)->get();;
        return view('site.duan.du-an-single',[
            'datas'=>$data, 
            'images'=> $image,
            'baidangs'=>$bai_dang
            ]);
    }
    public function destroy($id)
    {
    $duan = Duan::find($id);
    $duan->public= 1;
    $duan->save();
    return redirect()->route('du-an.index')->with('success','Đã xóa thành công ');
    }
}
