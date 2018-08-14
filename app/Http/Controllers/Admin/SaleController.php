<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Http\Requests\SaleRequest;

class SaleController extends Controller
{
   	public function index()
   	{
   		$sales = Sale::select()->orderBy('id', 'desc')->paginate(12);
   		return view('admin.sale.index', compact('sales'));
   	}

   	public function add()
   	{
        return view('admin.sale.create');
   	}

   	public function create(SaleRequest $request)
   	{
        $fileName = '';

        if ($request->hasFile('link')) {
            $file = $request->file('link');
            $fileName = $file->getClientOriginalName('link');
            $file->move('uploads', $fileName);
        } 
        
        $request->merge([
            'image' => $fileName,
        ]);
        dd($request->all());
        Sale::create($request->all());

        if ($request->add_more == 'on') {
            return redirect()->back();
        } 
           
        return redirect('admin/sale/');
        
   	}

   	public function edit($id)
   	{
        $sale = Sale::findOrFail($id);

        return view('admin.sale.edit', compact('sale'));
    }

    public function update(SaleRequest $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $fileName = $request->link;

        if ($request->hasFile('imge')) {
            $file = $request->file('imge');
            $fileName = $file->getClientOriginalName('link');
            $file->move('uploads', $fileName);
        }
        $sale->name = $request->name;
        $sale->image = $fileName;
        $sale->description = $request->description;
        $sale->status = $request->status;
        $sale->total = $request->total;
        $sale->sale = $request->sale;
        $sale->date_create = $request->date_create;
        $sale->date_end = $request->date_end;
        $sale->save();

        if ($request->add_more == 'on') {
            return redirect()->back();
        }

        return redirect('admin/sale/');
   	}

    public function change($id)
    {
        $sale = Sale::findOrFail($id);

        if ($sale->status == 0) {
            $sale->status = 1;
        } else {
            $sale->status = 0;
        }
        $sale->save();
        
        return redirect()->back();
    }
}
