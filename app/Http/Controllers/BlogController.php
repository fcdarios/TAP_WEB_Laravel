<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
Use Alert;

Alert::html('Html Title', 'Html Code', 'Type');

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $posts = Blog::all();
        return view("admin/admin_blog", ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('admin/blog_create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->titulo = $request->get('titulo');
        $blog->contenido = $request->get('contenido');
        $blog->autor = $request->get('autor');
        $blog->imagen = $request->get('imagen');
        $blog->fecha_creacion = date('Y-m-d');
        $blog->save();
        return redirect('/admin/blog')->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $blog = Blog::find($id);
        return view(('admin/blog_edit'), ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->titulo = $request->get('titulo');
        $blog->contenido = $request->get('contenido');
        $blog->autor = $request->get('autor');
        $blog->imagen = $request->get('imagen');
        $blog->fecha_creacion = date('Y-m-d');
        $blog->save();
        return redirect('/admin/blog')->with('success', 'Registro actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect('/admin/blog')->with('success', 'Registro borrado correctamente');
    }
}
