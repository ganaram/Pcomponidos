<?php

namespace App\Http\Controllers;

use App\Component;
use Illuminate\Http\Request;
use App\Http\Requests\ComponentRequest;

class ComponentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components = Component::paginate(10);
        return view('public.components.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComponentRequest $request)
    {
        Component::create([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'info'   => request('info'),
            'type' => request('type')
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show($component)
    {
        $component = Component::where('slug', $component)->firstOrFail();

        return view('public.components.show', compact('components'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        return view('public.components.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(ComponentRequest $request, Component $component)
    {
        $component->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'info'   => request('info'),
            'type' => request('type')
        ]);

        return redirect('/components/'.$component->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {
        $component->delete();

        return redirect('/');
    }
}
