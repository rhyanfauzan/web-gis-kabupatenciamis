<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaanUserController extends Controller
{
    //
    public function index()
    {
        return view('backend.pengelolaan-user.index');
    }

    public function getData(Request $request)
    {
        $start = $request->get('start');
        $length = $request->get('length');
        $draw = $request->get('draw');
        $search = $request->get('search');
        $searchValue = $search['value'];

        $list = User::where('name', 'like', "%$searchValue%")->orderBy('id')->take($length)->skip($start)->get();
        $recordsTotal = User::count();
        $recordsFiltered = User::where('name', 'like', "%$searchValue%")->orderBy('id')->count();

        return response()->json([
            'draw' => (int)$draw,
            'recordsTotal' => (int)$recordsTotal,
            'recordsFiltered' => (int)$recordsFiltered,
            'data' => $list,
        ]);
    }

    public function add()
    {
        return view('backend.pengelolaan-user.add');
    }

    public function edit($id)
    {
        $item = User::find($id);
        return view('backend.pengelolaan-user.edit', compact('item'));
    }

    public function insert(Request $request)
    {
        $data = $request->only('email', 'role', 'name', 'password');
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('backend.pengelolaanUser.index');
    }

    public function update($id, Request $request)
    {
        $data = $request->only('email', 'role', 'name', 'password');
        $data['password'] = Hash::make($data['password']);
        User::where('id', $id)->update($data);
        return redirect()->route('backend.pengelolaanUser.index');
    }

    public function delete($id)
    {
        $item = User::find($id);
        $item->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
