<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Seller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Models\Cart;

class ProductController extends Controller
{
    public function index($categoryId = null): Application|Factory|View
    {
        $categoryCount = Category::where(['id' => $categoryId, 'status' => 1])->count();

        if($categoryCount > 0) {
            $categoryDetails = Category::categoryDetails($categoryId);
            echo "<pre>"; print_r($categoryDetails); die;
        }


        abort(404);

        $productsPerPage = 10;
        $productCount = Product::products()->where('products.status', 1)->count();
        $productsQuery = Product::products()->where('products.status', 1);
        if($categoryId !== null) {
            $productsQuery->where('products.category_id', $categoryId);
        }
        $products = $productsQuery->orderByDesc('products.id')->paginate(10);

        $sellers = Seller::sellers()->get()->toArray();

        return View('products')
            ->with(compact('products', 'sellers'))
            ->with(compact('productCount', 'productsPerPage'));
    }

    public function productDetails($id): Application
    {
        $details = [
            'details' => Product::find($id),
            'products' => Product::join('manufacturers', 'products.man_id', '=', 'manufacturers.man_id')
                -> get() -> shuffle()
        ];

        return view('details', compact('details'));
    }

    public function cart(): View|Factory|Redirector|RedirectResponse|Application
    {
        if(!Auth::check()) {
            return redirect('/sign-in');
        }

        $cart = [
            'cart' => Cart::join('products', 'cart.product_id', '=', 'products.id')
                ->where('cart.user_id', '=', Auth::id())
                -> get(),
            'total' => Cart::select(DB::raw('sum(cart.quantity * cart.unit_price) AS total'))
                -> get(),
            'products' => Product::join('manufacturers', 'products.man_id', '=', 'manufacturers.man_id')
                -> get() -> shuffle()
        ];

        return view('cart', compact('cart'));
    }

    public function addToCart(Request $req): Redirector|RedirectResponse|Application
    {
        if(!Auth::check()) {
            return redirect('/sign-in');
        }

        $cart = new Cart;
        $cart -> product_id = $req -> product_id;
        $cart -> user_id = Auth::id();
        $cart -> quantity = $req -> quantity;
        $cart -> size = $req -> size;
        $cart -> unit_price = substr($req -> price, 0, -2);
        $cart -> save();

        return back();
    }
}
