<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display the cart.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        // Calculate total and get product details
        $cartItems = [];
        foreach ($cart as $id => $details) {
            $product = Product::find($id);
            if ($product) {
                $cartItems[$id] = [
                    'product' => $product,
                    'quantity' => $details['quantity']
                ];
                $total += $product->price * $details['quantity'];
            }
        }
        
        return view('cart.index', compact('cartItems', 'total'));
    }
    
    /**
     * Add a product to the cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $id = $request->product_id;
        $quantity = $request->quantity;
        
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }
        
        $cart = session()->get('cart', []);
        
        // If item already in cart, update quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'quantity' => $quantity
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès.');
    }
    
    /**
     * Update cart item quantity.
     */
    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $id = $request->product_id;
        $quantity = $request->quantity;
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Panier mis à jour avec succès.');
    }
    
    /**
     * Remove an item from the cart.
     */
    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id'
        ]);
        
        $id = $request->product_id;
        
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Produit retiré du panier avec succès.');
    }
}
