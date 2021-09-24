<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use App\Models\User;
class NovelController extends Controller
{
    //
    public function index()
    {
        $novels = Novel::all();
        $users = User::all();

        // 名前をセット
        foreach ( $novels as $novel ){
            foreach ( $users as $user ){
                if ( $user->id == $novel->user_id){
                    $novel->author = $user->name;
                }
            }
        }
        return view('novel/index', compact('novels'));
    }
    public function edit($id)
    {
        $novel = Novel::findOrFail($id);
        $users = User::all();

        return view('novel/edit')
            ->with('novel', $novel)
            ->with('users', $users);
    }
    public function update(Request $request, $id)
    {
        $novel = Novel::findOrFail($id);
        $novel->title = $request->title;
        $novel->user_id = $request->user_id;
        $novel->save();
        return redirect('/novel');
    }
    public function destroy($id)
    {
        $novel = Novel::findOrFail($id);
        $novel->delete();
        return redirect("/novel");
    }
    public function create()
    {
        $novel = new Novel();
        $users = User::all();
        return view('novel/create')
            ->with('novel', $novel)
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        $novel = new novel();
        $novel->title = $request->title;
        $novel->user_id = $request->user_id;
        $novel->save();
        return redirect("/novel");
    }
}
