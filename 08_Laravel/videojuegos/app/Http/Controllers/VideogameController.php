<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //titulo, pegi y genero
        $videojuegos = [
            ["Elden Ring", "PEGI 18", "Souls"],
            ["Hollow Knight", "PEGI 10", "Metroidvania"],
            ["Blasphemous", "PEGI 16", "Metroidvania"],
            ["The Legend of Zelda", "PEGI 10", "Aventuras"]
        ];

        return view('videojuegos/index', ["videojuegos" => $videojuegos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
