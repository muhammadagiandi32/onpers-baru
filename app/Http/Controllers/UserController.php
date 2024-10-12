<?php
namespace App\Http\Controllers;

use App\Models\User; // Pastikan model User sudah di-import
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function wartawanIndex()
    {
        // Ambil semua user dengan role 'Wartawan'
        $wartawanUsers = User::where('role', 'Wartawan')->whereNot('email', auth()->user()->email)->get();

        // Kembalikan ke view 'index.blade.php' dengan data user Wartawan
        return view('wartawan.index', compact('wartawanUsers'));

    }
    public function narasumberIndex()
{
    $narasumberUsers = User::where('role', 'Narasumber')->get();
    return view('narasumber.index', compact('narasumberUsers'));
}
public function humasIndex()
{
    $humasUsers = User::where('role', 'Humas')->get();
    return view('humas.index', compact('humasUsers'));
}
public function jasaIndex()
{
    $jasaUsers = User::where('role', 'Jasa')->get();
    return view('jasa.index', compact('jasaUsers'));
}
public function umumIndex()
{
    $umumUsers = User::where('role', 'Umum')->get();
    return view('umum.index', compact('umumUsers'));
}

}
