<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.view', compact('users'));
    }

    public function destroy(string $id)
    {
        $user = USer::find($id);

        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'data berhasil terhapus']);

    }
}
