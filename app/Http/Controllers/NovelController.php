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
        return view('novel/edit', compact('novel'));
    }
    public function update(Request $request, $id)
    {
        $novel = Novel::findOrFail($id);
        $novel->title = $request->title;
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
        return view('novel/create', compact('novel'));
    }

    public function store(Request $request)
    {
        $novel = new novel();
        $novel->title = $request->title;
        $novel->save();
        return redirect("/novel");
    }
}
