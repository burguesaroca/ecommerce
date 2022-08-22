<?php

namespace App\Http\Controllers\api\Gestion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Gestion\Product;
use App\Model\Gestion\Client;
use App\Model\Gestion\Order;
use App\Model\Gestion\OrderDetail;

use DB;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        date_default_timezone_set('UTC');

        return Order::with([
            'clients:id,names,surnames,address,email,phone',
            'details',
            'details.products',
        ])->orderby('id', 'DESC')->paginate(8);
    }    

    public function sendOrder(Request $request){
        $messages = [
            'pedido.names.max' => 'El nombre no debe tener más de 30 caracteres.',
            'pedido.surnames.max' => 'El apellido no debe tener más de 30 caracteres.',
            'pedido.address.max' => 'La dirección no debe tener más de 50 caracteres.',
            'pedido.email.email' => 'El email tiene el formato incorrecto.',
            'pedido.email.max' => 'El email no debe tener más de 50 caracteres.',
            'pedido.number.numeric' => 'La identificación debe ser númerica.',
            'pedido.number.digits' => 'El número de identificación debe tener 10 digitos.',
            'pedido.phone.digits' => 'El teléfono debe ser de a 10 digitos.',
        ];

        $this->validate(request(), [
            'pedido.number' => 'required|numeric|digits:10',
            'pedido.names' => 'required|max:30',
            'pedido.surnames' => 'required|max:30',
            'pedido.address' => 'required|max:50',
            'pedido.email' => 'required|email|max:50',
            'pedido.phone' => 'required|numeric|digits:10',
        ], $messages);

        DB::beginTransaction();
        try {

        $client = Client::where('number',$request->get('pedido')['number'])->first();

        if(!empty($client)){
            $client->number = $request->get('pedido')['number'];
            $client->names = $request->get('pedido')['names'];
            $client->surnames = $request->get('pedido')['surnames'];
            $client->address = $request->get('pedido')['address'];
            $client->email = $request->get('pedido')['email'];
            $client->phone = $request->get('pedido')['phone'];
            $client->save();
        } else {
            $client = new Client();
            $client->number = $request->get('pedido')['number'];
            $client->names = $request->get('pedido')['names'];
            $client->surnames = $request->get('pedido')['surnames'];
            $client->address = $request->get('pedido')['address'];
            $client->email = $request->get('pedido')['email'];
            $client->phone = $request->get('pedido')['phone'];
            $client->save();
        }

        $order = new Order();
        $order->client_id = $client->id;
        $order->total = $request->get('pedido')['total'];
        $order->save();

        foreach($request->get('carrito') as $p){
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $p['id'];
            $order_detail->price = $p['price'];
            $order_detail->quantity = $p['quantity'];
            $order_detail->total = $p['total_producto'];
            $order_detail->save();

            $product = Product::where('id', $p['id'])->first();
            $product->stock = $product['stock'] - $p['quantity'];
            $product->save();     
        }
        DB::commit();        

    }
    catch (\Throwable $th) {
      DB::rollback();
      return response()->json(['errors'=> $th->getMessage()], 501);
            }        
    }    

}
