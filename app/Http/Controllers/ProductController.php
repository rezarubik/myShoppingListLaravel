<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('product')->get();
        return view('dashboard', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        $message = [
            'required' => 'Data ini wajib diisi!',
            'numeric' => 'Wajib diisi dengan angka'
        ];
        $this->validate($request, $rules, $message);
        $query = DB::table('users')->join('product', 'product.id_users', '=', 'users.id')->get();
        DB::table('product')->insert([
            'name' => $request->name,
            'id_users' => $query[0]->id,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => 0
        ]);
        return redirect('/product');
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
        $product = DB::table('product')->where('id', $id)->get();
        // dd($product);
        // die();
        return view('product/edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric'
        ];
        $message = [
            'required' => 'Data ini wajib diisi!',
            'numeric' => 'Wajib diisi dengan angka'
        ];
        $this->validate($request, $rules, $message);
        $query = DB::table('users')->join('product', 'product.id_users', '=', 'users.id')->get();
        DB::table('product')->where('id', $request->id)->update([
            'name' => $request->name,
            'id_users' => $query[0]->id,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => 0
        ]);
        return redirect('/product');
    }
    // this function for update the status. If status = 0 then Bought, if status = 1 then Unbought
    public function bought(Request $request)
    {
        #
        DB::table('product')->where('id', $request->id)->update([
            'status' => 1
        ]);
        return redirect('/product');
    }
    public function unbought(Request $request)
    {
        #
        DB::table('product')->where('id', $request->id)->update([
            'status' => 0
        ]);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Product::where('id', $id)->delete();
    //     return redirect()->route('product.index');
    // }
    public function destroy($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return redirect('/product');
    }

    public function grafik()
    {
        $users = DB::table('users')->get();
        $data = [];
        $label = [];

        foreach ($users as $key => $value) {
            $data[$key] = DB::table('product')->where('id_users', $value->id)->count();
            $label[$key] = $value->name;
        }

        return view('product.graph', [
            'data' => json_encode($data),
            'label' => json_encode($label)
        ]);
    }
}
