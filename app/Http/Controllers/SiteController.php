<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(3);
    
        return view('site.home', compact('produtos'));
    }

    public function details(string $slug)
    {
        $produto = Produto::where('slug', $slug)->first();
    
        return view('site.details', compact('produto'));
    }

    public function categoria(string $id)
    {
        $produto = Produto::where('id_categorias', $id)->paginate(3);
    
        return view('site.categoria', compact('produto'));
    }

}
