<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\User;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        $id_user = Auth::user()->id;
        $product = DB::table('product')->where('id_users', $id_user)->get();
        return view('dashboard', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkDataError = "";
        return view('product/create')->with('checkDataError', $checkDataError);
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
        // $query = DB::table('users')->join('product', 'product.id_users', '=', 'users.id')->get();
        // $getNameProduct = DB::table('users')

        $checkName = DB::table('product')
            ->where([['name', $request->name], ['id_users', Auth::user()->id]])
            ->count();

        $checkDescription = DB::table('product')
            ->where([['description', $request->description], ['id_users', Auth::user()->id]])
            ->count();

        // dd([$checkName, $checkDescription]);
        // die();

        // $checkDataError = "";

        if ($checkName > 0) {
            $checkDataError = "Nama barang telah terpakai";
            return redirect('/product/create')->with('checkDataError', $checkDataError);
        } else if ($checkDescription > 0) {
            $checkDataError = "Deskripsi barang tidak boleh sama";
            return redirect('/product/create')->with('checkDataError', $checkDataError);
        } else {
            $id_user = Auth::user()->id;
            DB::table('product')->insert([
                'name' => $request->name,
                'id_users' => $id_user,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'status' => '0'
            ]);

            return redirect('/product');
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
            'id_users' => Auth::user()->id,
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
        $udahBeli = DB::table('product')->where([['status', '1'], ['id_users', Auth::user()->id]])->get();
        $belumBeli = DB::table('product')->where([['status', '0'], ['id_users', Auth::user()->id]])->get();

        $dataBeli = [];
        $labelBeli = [];

        $dataBelomBeli = [];
        $labelBelomBeli = [];

        foreach ($udahBeli as $key => $value) {
            $query = DB::table('product')->where('id', $value->id)->get();
            $dataBeli[$key] = $query[0]->quantity;
            $labelBeli[$key] = $value->name;
        }

        foreach ($belumBeli as $key => $value) {
            $query = DB::table('product')->where('id', $value->id)->get();
            $dataBelomBeli[$key] = $query[0]->quantity;
            $labelBelomBeli[$key] = $value->name;
        }

        return view('product.graph', [
            'dataBeli' => json_encode($dataBeli),
            'labelBeli' => json_encode($labelBeli),
            'dataBelomBeli' => json_encode($dataBelomBeli),
            'labelBelomBeli' => json_encode($labelBelomBeli)
        ]);
    }
}
