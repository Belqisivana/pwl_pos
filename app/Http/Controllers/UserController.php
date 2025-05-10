<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Hitung jumlah user dengan level_id = 2
        $jumlahUserLevelDua = UserModel::where('level_id', 2)->count();

        // Kirim jumlah tersebut ke view
        return view('user', ['jumlah' => $jumlahUserLevelDua]);
    }
}