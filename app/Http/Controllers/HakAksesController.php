<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HakAksesModel;

class HakAksesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
      // $this->HakAksesModel = new HakAksesModel();
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      // View Hak Akses dan parsing data

      $users = DB::table('users')->get();

      return view('admin.v_hakAkses', ['users' => $users]);
  }

  public function detailUsers($id_users)
  {
      # code...
      $user = DB::table('users')->where('id', $id_users)->first();
  }

  public function tambahPengguna()
  {
      return view('admin.v_entri-akses');
  }
  
  public function editPengguna($id = null)
  {
    if ($id == null) {
      Request()->validate(
        [
          'name'      => 'required',
          'email'     => 'required',
          'is_admin'  => 'required',
        ],
        []
      );
      
      $data = [
        'name'        => Request()->name,
        'email'       => Request()->email,
        'is_admin'    => Request()->is_admin,
        'created_at'  => now(),
      ];

      if (Request()->password !== null) {
        $data['password'] = bcrypt(Request()->password);
      }
      DB::table('users')->where('id', Request()->id_pengguna)->update($data);
      return redirect()->route('admin-akses-pengguna')->with('status', 'Berhasil edit pengguna');
    }
    $data = DB::table('users')->where('id', $id)->first();
    // dd($data);
    return view('admin.editAkses', ['data'  => $data]);
  }

  public function simpanPengguna()
  {
    // dd(Request());
      // validasi
    Request()->validate(
      [
        'name'      => 'required',
        'email'     => 'required|unique:users,email',
        'is_admin'  => 'required',
        'password'  => 'required'
      ],
      []
    );
    
    $data = [
      'name'        => Request()->name,
      'email'       => Request()->email,
      'is_admin'    => Request()->is_admin,
      'password'    => bcrypt(Request()->password),
      'created_at'  => now(),
    ];
    DB::table('users')->insert($data);
    return redirect()->route('admin-akses-pengguna')->with('status', 'Berhasil tambah pengguna');
  }

  public function hapusPengguna($id)
  {
    DB::table('users')->where('id', $id)->delete();
    return redirect()->route('admin-akses-pengguna')->with('status', 'Berhasil hapus pengguna');
  }
  // public function simpanPewengguna()
  // {
  //     // validasi
  //     Request()->validate(
  //         [

  //             'nama' => 'required',
  //             'email' => 'required|unique:users,email',
  //             'is_admin' => 'required',
  //             'password' => 'required'
  //         ],
  //         []
  //     );

  //     // $user = new HakAksesModel();

  //     $data = [
  //         'name' => Request()->name,
  //         'email' => Request()->email,
  //         'is_admin' => Request()->is_admin,
  //         'password' =>  bcrypt(Request()->password),
  //         'created_at' => now(),
  //     ];
  //     dd($data);
  //     // $user->save($data);


  //     // $user->name = $request->name;
  //     // $user->email = $request->email;
  //     // $user->is_admin = $request->is_admin;
  //     // $user->password = bcrypt($request->password);
  //     // // $user->remember_token = $request->_token;

  //     // return response()->json($user);
  //     return redirect()->back();
  // }
}
