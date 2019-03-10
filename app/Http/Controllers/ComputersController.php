<?php

namespace App\Http\Controllers;

use App\Component;
use App\Brand;
use App\Computer;
use Illuminate\Http\Request;
use App\Http\Requests\ComputerRequest;

class ComputersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        $this->middleware('can:touch,computer',[
            'only' => ['edit','update','destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $computers = Computer::with(['user','components'])
        ->latest()
        ->paginate(10);

        return view('public.computers.index')->withComputers($computers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $components = Component::all();
        $brands = Brand::all();

        return view('public.computers.create', [
            'components' => $components,
            'brands'    => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest $request)
    {

        $img = $request->file('img');

        $computer = Computer::create([
            'user_id' => $request->user()->id,
            'model' => request('model'),
            'slug' => str_slug(request('model'), "--"),
            'description' => request('description'),
            'price' => request('price'),
            'img' => $img->store('imgs','public')
        ]);

        $computer->components()->sync( request('component') );

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $computer = Computer::where('slug', $slug)->firstOrFail();

        return view('public.computers.show', ['computer' => $computer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function edit(Computer $computer)
    {
        $components = Component::all();

        return view('public.computers.edit', [
            'computer' => $computer,
            'components' => $components
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function update(ComputerRequest $request, Computer $computer)
    {

        $img = $request->file('img');
        
        $computer->update([
            'model' => request('model'),
            'slug' => str_slug(request('title'), "-"),
            'description' => request('description'),
            'price' => request('price'),
            'img' => $img->store('imgs','public')
        ]);

        $computer->components()->sync( request('component') );

        return redirect('/computers/'.$computer->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Computer  $computer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Computer $computer)
    {
        $computer->components()->detach();
        $computer->delete();

        return redirect('/');
    }
}
