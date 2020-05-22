<?php

namespace App\Http\Controllers;
use App\posts;
use App\items;
use App\sales_perchase_request_details;
use App\supplier;
use App\temp_purchase_orders;
use Illuminate\Http\Request;

class PostsController extends Controller
{
   public function create(){
      $post=posts::all();
      return view('posts',compact('post'));
    }
    public function store(Request $req){
         $this->validate($req, [
            'title'=>'required',
            'description'=>'required',
        ]);
        $files = $req->file('image');
        $extension = $files->getClientOriginalExtension();
        $fileName = "Post"."-".str_random(3).".".$extension;
        $folderpath  = 'uploads'.'/';
        $x=$files->move($folderpath , $fileName);
        posts::create([
            'title' => request()->get('title'),
            'description'=>request()->get('description'),
            'image' => $x,
        ]);
        return view('posts');
    }
     public function delete($id){
        posts::destroy($id);
        return redirect()->route('posts');
    }
    public function edit($id){

        $p= posts::find($id);
        return view('edit-post',compact('p'));
    }
    public function update($id,Request $request)
    {
        $post = posts::find($id);
        $post->update([
            'title' => request()->get('title'),
            'description' => request()->get('description'),

        ]);
        if ($request->hasFile('image')) {
            $files = $request->file('image');
            $extension = $files->getClientOriginalExtension();
            $fileName = "Post" . "-" . str_random(3) . "." . $extension;
            $folderpath = 'uploads' . '/';
            $x = $files->move($folderpath, $fileName);
            $post->update([
                'image' => $x,

            ]);

        }
        return redirect()->route('posts');
    }
}
