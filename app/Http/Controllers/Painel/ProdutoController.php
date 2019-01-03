<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

class ProdutoController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listagem dos produtos';
        $products = $this->product->all();
        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo produto';

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        /*
        for ($i = 0; $i < count($categories); $i++) { 
            $categories[$i] = strtoupper($categories[$i]);
        }
        */

        return view('painel.products.create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        /*
        Retorna apenas o valor do campo especificado
        dd($request->input('name'));

        Retorna o valo dos campos contidos no array
        dd($request->only(['name', 'number']));

        Retorna o valor de todos os campos exceto os que estão contidos no array
        dd($request->except(['_token', 'category']));

        Retorna o valor de todos os campos do formulário
        dd($request->all());
        */

        /* Faz o cadastro porém não usa a validação de segurançã do filable definido na Model
        $dataForm = $request->except('_token');
        $insert = $this->product->insert($dataForm);
        */

        $dataForm = $request->all();

        /*
        if (!isset($dataForm['active'])) {
            $dataForm['active'] = 0;
        }
        */

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //$this->validate($request, $this->product->rules);
        //$validate = Validator::make($dataForm, $this->product->rules);
        /*
        $validate = validator($dataForm, $rules, $messagesPtBr);
        if ($validate->fails()) {
            return redirect()
                ->route('produtos.create')
                ->withErrors($validate)
                ->withInput();
        }
        */

        $insert = $this->product->create($dataForm);

        if ($insert) {
            return redirect()->route('produtos.index');
        } else {
            return redirect()->back();
        }
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
        //Recupera o produto pelo seu id
        $product = $this->product->find($id);

        $title = "Editar Produto {$product->name}";

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categories', 'product'));
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
        return "Editando o item {$id}";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests ()
    {
        /* Forma trabalhosa para salvar os dados
        $prod = $this->product;
        $prod->name = 'Nome do produto';
        $prod->number = 131231;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description do produto aqui';
        $insert = $prod->save();
        */
        
        /* Forma simples de salvar os dados
        $insert = $this->product->create([
            'name'        => 'Nome do produto 2',
            'number'      => 434435,
            'active'      => false,
            'category'    => 'eletronicos',
            'description' => 'Descrição vem aqui'
        ]);
        
        if($insert) {
            return "Inserido com sucesso, ID: {$insert->id}";
        } else {
            return 'Falha ao inserir';
        }
        */
       
        /* Forma trabalhosa de alterar os dados
        $prod = $this->product->find(5);
        $prod->name = 'Update 2';
        $prod->number = 797890;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Desc Update';
        $update = $prod->save();

        if ($update) {
            return 'Alterado com sucesso!';
        } else {
            return 'Falha ao alterar.';
        }
        */

        /* Forma simples de alterar os dados
        $prod = $this->product->find(5);
        $update = $prod->update([
            'name'   => 'Update Test',
            'number' => 6765756,
            'active' => true
        ]);

        if ($update) {
            return 'Alterado com sucesso!';
        } else {
            return 'Falha ao alterar.';
        }
        */
       
        /* Alterar um registro com uma coluna diferente de ID
        $update = $this->product
            ->where('number', 131231)
            ->update([
                'name'   => 'Update Test 2',
                'number' => 67657560,
                'active' => false
            ]);

        if ($update) {
            return 'Alterado com sucesso 2!';
        } else {
            return 'Falha ao alterar';
        }
        */
       
        /* Forma trabalhosa de excluir dados
        $prod = $this->product->find(2);
        $delete = $prod->delete();
        */
       
        /* Forma simples de excluir dados
        $delete = $this->product->destroy(3);
        */

        // Excluindo um registro com uma coluna diferente da ID
        $delete = $this->product
            ->where('number', 434435)
            ->delete();

        if ($delete) {
            return 'Deletado com sucesso!';
        } else {
            return 'Falha ao deletar.';
        }
    }
}
