<?php
  
namespace App\Http\Controllers;
  
use App\Blog;
use Illuminate\Http\Request;
  
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Runing particular pages
        $blogs = Blog::paginate(5); 
  
        return view('blogs.index',compact('blogs')) 
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create'); //creation d'un nouveau blog
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ //validation methode ken rules s7a7 validation tkamel executi
            'title' => 'required',
            'description' => 'required',
        ]);
  

        Blog::create($request->all()); //request bech create all the inputs
   
        return redirect()->route('blogs.index') // raja3nli lel index ba3ed ma kamalna form
                        ->with('success','Blog created successfully.'); //message de validation
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blogs.show',compact('blog')); //http://127.0.0.1:8000/blogs/1 bech affichi blog 1
        //compact= array (blog=>$blog)                                          
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog')); //http://127.0.0.1:8000/blogs/1/edit to show blog number1
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([ //validate DATA
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $blog->update($request->all()); //request to update the inputs
  
        return redirect()->route('blogs.index') // to return to index
                        ->with('success','Blog updated successfully'); //validate message
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete(); //delete blog
  
        return redirect()->route('blogs.index')
                        ->with('success','Blogs deleted successfully');
    }
}