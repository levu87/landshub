<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User,
    Illuminate\Support\Facades\Auth,Validator,DB;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taikhoan()
    {
        return view('site.tai-khoan');
    }
    public function doimatkhau()
    {
        return view('site.change-password');
    }
    function changePassword(Request $request)
    {
        //print_r($request->all());
        $is_old = User::where([ 'id' => Auth::user()->id, 'plain_password' => ($request->old) ])->value('id');
        if(!$is_old)
        {
            return back()->with(['class'=>'danger','msg'=>'Mật khẩu hiện tại sai']);
        }else{
            // not confirm
            if($request->new != $request->cpass)
            {
                return back()->with(['class'=>'danger','msg'=>'Hai mật khẩu không trùng khớp']);
            }else{
                $update = User::where([ 'id' => Auth::user()->id, 'plain_password' => ($request->old) ])
                    ->update(['plain_password' => $request->new, 'password' => bcrypt($request->new)]);
                if($update)
                {
                    return back()->with(['class'=>'success','msg'=>'Đổi mật khẩu thành công']);
                }
            }
        }
    }
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.thanhvien.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.thanhvien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
  
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'plain_password' => $request['password'],
            'role'=>$request['role']
        ]);

        return redirect()->route('thanh-vien.index')
                        ->with('success','Tạo thành viên thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.thanhvien.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
        $user = User::find($id); 
        $user->name = $request->name;
        $user->email =$request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('thanh-vien.index')->with('success','Cập nhật thành công');
    }
    public function capnhat(Request $request)
    {
        $userId = Auth::id();
        $img =$request->user_image;
        $fileName ='';
        if ($request->hasFile('user_image')) {
        $folderDir = 'public/uploads/images/';
        $destinationPath = base_path() . '/' . $folderDir;
        // GET THE FILE EXTENSION
        $extension = $img->getClientOriginalExtension(); 
        // RENAME THE UPLOAD WITH RANDOM NUMBER 
        $fileName = '/uploads/images/'.rand() . '.' . $extension; 
        $img->move($destinationPath, $fileName); 
        }
        $user = User::find($userId); 
        $user->name = $request->name;
        $user->tom_tat = $request->about;
        $user->phone = $request->phone;
        $fileName == ''?:$user->avt=$fileName;
        $user->save();

        // Redirect to route
        return redirect('/tai-khoan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $user = User::find($id);
    $user->delete();
    return redirect()->route('thanh-vien.index')->with('success','Đã xóa thành công '.$user->email);
    }
}
