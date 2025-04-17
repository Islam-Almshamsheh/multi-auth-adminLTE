<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index',compact('tags'));
    }
    public function create()
   {
        return view('admin.tags.create');
   }

   public function store(Request $request)
   {
        $request->validate([
            'name'=> 'required|min:3|max:100',
        ]);

        Tag :: firstOrCreate(['name'=> $request->name]);
        return to_route('tags.index')->with('sucess','tag created successfully');
   }

   public function edit(Tag $tag)
   {
        return view('admin.tags.edit',['tag'=>$tag]);
   }

   public function update(Request $request, Tag $tag)
   {
        $validated = $request->validate([
            'name'=> 'required|min:3|max:100',
        ]);

        $tag ->update($validated);

        return to_route('tags.index')->with('success','tag updated successfully');
   }

   public function destroy(Tag $tag)
   {
        $tag->delete();
        return to_route('tags.index')->with('success','tag deleted successfully');
   }

}
