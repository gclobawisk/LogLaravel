<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LogController;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{

    protected $user_id;

    public function __construct()
    {

        if (Auth::check()) {

            $this->user_id = Auth::user()->id;
        }

    }

    public function getProdutos()
    {
        $products = Produtos::all();
        return view('products', compact('products'));
    }

    public function insertProduto(Request $request, $id)
    {
        
        $product = new Produtos();
        $product->nome = $request->input('nome');
        $product->descricao = $request->input('descricao');
        $product->preco = $request->input('preco');

        $product->save();


        // Criar o hash utilizando data, hora e ID Limitei a 12
        $log_vin = substr(Hash::make(now()->toDateString() . now()->toTimeString() . $id), 0, 12);

        
        $area = "GESTOR";
        $tabela_log = "Produtos";
        $log_des = json_encode(array_merge(array($tabela_log), $product->getAttributes()), JSON_UNESCAPED_UNICODE);
        $log_op = "INSERT";


        $logController = new LogController();
        $logController->saveLog($this->user_id, $area, $log_des, $log_op, $log_vin);


        return redirect()->route('produtos')->with('success', 'Produto Inserido com sucesso!');

    }


    public function updateProduto(Request $request, $id)
    {
        $product = Produtos::findOrFail($id);
        $produtosDadosAnteriores = Produtos::find($id); // Dados Antes do Preenchimento da request


        $product->fill($request->all());

        $product->nome = $request->input('nome');
        $product->descricao = $request->input('descricao');
        $product->preco = $request->input('preco');


        // Antes de Salvar os Dados do Produto.. Vamos salvar os dados na Tabela Log

        // Criar o hash utilizando data, hora e ID Limitei a 12
        $log_vin = substr(Hash::make(now()->toDateString() . now()->toTimeString() . $id), 0, 12);

        $area = "GESTOR";
        $tabela_log = "Produtos";
        $log_des = json_encode(array_merge(array($tabela_log), $produtosDadosAnteriores->getAttributes()), JSON_UNESCAPED_UNICODE);
        $log_op = "UPDATE";


        $logController = new LogController();
        $logController->saveLog($this->user_id, $area, $log_des, $log_op, $log_vin);


        $product->save();


        // Após Salvar os Dados do Produto.. Salva os dados na Tabela Log
        $log_des = json_encode(array_merge(array($tabela_log), $product->getAttributes()), JSON_UNESCAPED_UNICODE);
        $logController = new LogController();
        $logController->saveLog($this->user_id, $area, $log_des, $log_op, $log_vin);

        return redirect()->route('produtos')->with('success', 'Produto atualizado com sucesso!');
    }


    public function destroyProduto(Request $request, $id)
    {
    
        $product = Produtos::find($id);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado.'], 404);
        }

        // Criar o hash utilizando data, hora e ID
        $log_vin = substr(Hash::make(now()->toDateString() . now()->toTimeString() . $id), 0, 12);


        $area = "GESTOR";
        $tabela_log = "Produtos";
        $log_des = json_encode(array_merge(array($tabela_log), $product->getAttributes()), JSON_UNESCAPED_UNICODE);
        $log_op = "DELETE";


        $logController = new LogController();
        $logController->saveLog($this->user_id, $area, $log_des, $log_op, $log_vin);

        // $product->delete();


        // Após o delete
        $log_des = json_encode(array_merge(array($tabela_log, $id)));

        $logController = new LogController();
        $logController->saveLog($this->user_id, $area, $log_des, $log_op, $log_vin);

        return redirect()->route('produtos')->with('success', 'Produto Deletado com sucesso!');
    }

    

}
