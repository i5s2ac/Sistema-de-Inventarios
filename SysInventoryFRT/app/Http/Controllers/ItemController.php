<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Picqer\Barcode\BarcodeGeneratorPNG;

class ItemController extends Controller
{

    public function index()
    {
        // $items = Item::latest()->paginate(5);
        $items = Item::all();

        return view('items.index', compact('items'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('items.create');
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'acquisition_cost' => 'required',
            'acquisition_date' => 'required',
            'storage_cost' => 'required|numeric',
            'typeItem' => 'required',
            'photo' => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $typeItem = $validatedData['typeItem'];

        // Guardar la imagen y almacenar la ruta en la base de datos
        $filepath = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $filepath = 'uploads/items/' . $filename;
            Storage::disk('public')->put($filepath, file_get_contents($photo));
        }

        for ($i = 1; $i <= $request->quantity; $i++) {
            $sku = "FRT-" . $typeItem . '-' . uniqid();
            $generator = new BarcodeGeneratorPNG();
            $barcode = $generator->getBarcode($sku, $generator::TYPE_CODE_128, 1, 150);

            $path = 'public/barcode/' . uniqid() . '.png';
            $file = Storage::put($path, $barcode);

            $items[] = [
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'quantity' => 1,
                'acquisition_cost' => $validatedData['acquisition_cost'],
                'acquisition_date' => $validatedData['acquisition_date'],
                'storage_cost' => $validatedData['storage_cost'],
                'typeItem' => $validatedData['typeItem'],
                'sku' => $sku,
                'barcode_image_path' => $path,
                'photo' => $filepath,
            ];
        }

        Item::insert($items);

        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }


    public function generateBarcode($sku)
    {
        $generator = new BarcodeGeneratorPNG();

        $barcode = $generator->getBarcode($sku, $generator::TYPE_CODE_128, 1, 150);

        //return file_put_contents(public_path('images/barcode-' . $sku . '.png'), $barcode);
    }


    public function show(Item $item)
    {
        $this->generateBarcode($item->sku);
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'acquisition_cost' => 'required',
            'acquisition_date' => 'required',
            'storage_cost' => 'required',

        ]);

        $item->update($request->all());

        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully');
    }
}
