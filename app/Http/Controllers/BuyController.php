<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
                //login user    //relasi dari model user
        $carts = auth()->user()->carts; //dimana user memiliki carts apa aja melalui relasi
        // $total = auth()->user()->carts->sum('subprice');
        $tot = $carts->sum('subprice');

        return view('cart.index', [
            'carts' => $carts,
            'total' => $tot
        ]);
    }

    public function addToCart(Restaurant $restaurant, Menu $menu)
    {
        // return $restaurant;
       $subprice = request()->quantity * $menu->price;

                                // cek apakah di dalam cart ada menu id yang sama dengan menu baru yang dibeli
    // user dianalogikan memiliki banyak carts maka ketika di return hasilnya array, gunakan first() untuk mengambil data pertama sehingga tidak mereturn banyak data (array)
       $userCart = auth()->user()->carts->where('menu_id', $menu->id)->first();

       // kalau menu sudah ada
       if ($userCart) {
           $userCart->update([
               'quantity' => $userCart->quantity + request()->quantity,
           ]);
           
       } else {
           auth()->user()->carts()->create([
               'restaurant_id' => $restaurant->id,
               'menu_id' => $menu->id,
               'quantity' => request()->quantity,
               'subprice' => $subprice
           ]);
       }

       return redirect()->back();
    }

    public function update(Cart $cart)
    {
        // request()->validate([
        //     'note' => ['required', 'min:2']
        // ]);

        $cart->update([
            'note' => request()->note
        ]);

        return redirect()->back();
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }

    function additionalPrice() {
        $service = 2000;
        $shipping = 10000;

        return [
            "service" => $service,
            "shipping" => $shipping,
        ];
    }

    public function checkout()
    {
        // return $this->additionalPrice()['service'];

        $carts = auth()->user()->carts; 
        $subtotal = $carts->sum('subprice');

        $service = $this->additionalPrice()['service'];
        $shipping = $this->additionalPrice()['shipping'];

        $total = $subtotal + $service + $shipping;

        return view('cart.checkout', [
            'carts' => $carts,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'service' => $service,
            'total' => $total,
        ]);
    }

    public function createIinvoice()
    {
        $carts = auth()->user()->carts;
        $subtotal = $carts->sum('subprice');

        $service = $this->additionalPrice()['service'];
        $shipping = $this->additionalPrice()['shipping'];

        $discount = 0;

        if (request()->voucher == 'kenyangin' || request()->voucher == 'KENYANGIN') {
            $discount = 10000;
        }

        $invoice = auth()->user()->invoices()->create([
            'address' => request()->address,
            'payment' => request()->payment,
            'shipping' => $shipping,
            'service' => $service,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $subtotal+$service+$shipping-$discount
        ]);

        // return $carts;
        foreach ($carts as $cart) {
            auth()->user()->boughts()->create([
                'invoice_id' => $invoice->id,
                'restaurant_id' => $cart->restaurant_id,
                'menu_id' => $cart->menu_id,
                'note' => $cart->note,
                'quantity' => $cart->quantity,
                'subprice' => $cart->subprice,
            ]);
        }

        auth()->user()->carts()->delete();

        return redirect()->route('show.invoice');
    }

    public function showInvoice()
    {
        // mengambil data terakhir berdasarkan created_at
        $invoice = auth()->user()->invoices->last();

        $boughts = Bought::where('invoice_id', $invoice->id)->get();

        return view('invoice.show', [
            'invoice' => $invoice,
            'boughts' => $boughts,
        ]);
    }

}
