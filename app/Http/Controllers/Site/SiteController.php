<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        /*
        //Forma mais extensa de passar valor pra view
        $teste = 123;
        $teste2 = 321;
        $teste3 = 132;
        return view('teste', ['teste' => $teste, 'teste2' => $teste2, 'teste3' => $teste3]);
        */        

        //Forma mais simples de passar valor pra view
        //return view('site.home.index', compact('teste', 'teste2', 'teste3'));

        $title = 'Titulo teste';

        $xss = '<script>alert("Ataque XSS");</script>';

        $var1 = '123';

        $arrayData = [1,2,3,4,5,6,7,8,9];

        return view('site.home.index', compact('title', 'xss', 'var1', 'arrayData'));
    }

    public function contato()
    {
    	return view('site.contact.index');
    }

    public function categoria($id) {
    	return "Listagem dos posts da categoria: {$id}";
    }

    public function categoriaOp($id = 1) {
    	return "Listagem dos posts da categoria: {$id}";
    }
}
