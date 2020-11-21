<?php

namespace App\Http\Controllers\Story;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Story;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.story.story', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.story.story-create', compact('tags', 'categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//"category_id": "2",
//"type_id": "1",
//"name": "Cosmetics",
//"tags": [],
//"image": "portrait-beautiful-young-woman-with-red-lips_158538-1940.jpg",
//"summery": "dgsdgdf"
//"story": "dhdfhdfh"
        $this->validate($request, [

            'category_id' => 'required',
            'type_id' => 'required',
            'name' => 'required|unique:stories,name',
            'tags' => 'required',
            'image' => 'required',
        ]);

        if ($request->type_id == 1){

            $this->validate($request,[
                'summery' => 'required',
            ]);
        }else{
            $this->validate($request,[
                'story' => 'required',
            ]);
        }

        $story = Story::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
            'type_id' => $request->type_id,
            'name' => $request->name,
            'slug' => str::slug($request->name),
            'thumbnail' => 'image.jpg',
            'story' => $request->name,
            'published_at' => Carbon::now()
        ]);

        $story->tags()->attach($request->tags);

        if ($request->type_id == 1){
            $story->story = $request->summery;
            $story->save();

        }else{
            $story->story = $request->story;
            $story->save();
        }

        if ($request->has('image')) {
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/story/', $image_new_name);
            $story->thumbnail = '/storage/story/' . $image_new_name;
            $story->save();
        }

        Session::flash('success', 'Story Created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Story $story)
    {
        return view('admin.story.story-show',compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
