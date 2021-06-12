<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HakAksesModel extends Model
{
    protected $table = "users";
    protected $fillable = ['name', 'email', 'password', 'is_admin'];
    public function HakAksesData()
    {
        # code...
        // $users = DB::table('users')->get();

        // return view('admin.v_hakAkses', ['users' => $users]);
    }
}
