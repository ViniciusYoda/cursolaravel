<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vanilo\Cart\Facades\Cart; // Usando o pacote Vanilo

class CarrinhoController extends Controller
{
    public function carrinhoLista() {
        $itens = Cart::items(); // Obtém os itens do carrinho com Vanilo
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(Request $request) {
        Cart::addItem([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qnt),
            'attributes' => [
                'image' => $request->image
            ]
        ]);

        return redirect()->route('site.carrinho')->with('successo', 'Produto adicionado ao carrinho');
    }

    public function removeCarrinho(Request $request) {
        $cart = new Cart();
        $cart->removeItem($request->id); // Remove item do carrinho com Vanilo
        return redirect()->route('site.carrinho')->with('successo', 'Produto removido do carrinho');
    }

    public function atualizaCarrinho(Request $request) {
        Cart::updateItem($request->id, [
            'quantity' => abs($request->quantity) // Atualiza a quantidade do item no carrinho
        ]);

        return redirect()->route('site.carrinho')->with('successo', 'Quantidade do produto atualizada');
    }

    public function limparCarrinho() {
        $cart = new Cart();
        $cart->clear(); 
        return redirect()->route('site.carrinho')->with('aviso', 'Carrinho limpo');
    }
}
