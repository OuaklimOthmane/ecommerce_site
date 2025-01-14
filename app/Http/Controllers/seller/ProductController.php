<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Color;
use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductsImage;
use Illuminate\Support\Str;
use DB;
use Auth;

class ProductController extends Controller
{
    //show products list

    public function index()
    {
        $id = Auth::user()->id;

        $maincategories = Seller::find($id)->maincategory()->orderBy('libelle')->get();
        $products = Product::with(['seller', 'maincategory'])->where(['seller_id' => $id])->selection()->get();
        return view('seller.stock.index', compact('products'));
    }

    public function create()
    {
        $id = Auth::user()->id;

        $maincategories = Seller::find($id)->maincategory()->orderBy('libelle')->get();
        $categories = json_decode(json_encode($maincategories));


        $colors = Color::get();




        return view('seller.stock.create')->with(compact('categories', 'colors'));
    }

    public function store(ProductRequest $request)
    {



        try {
            $filePath = "";
            if ($request->has('main_image')) {
                $filePath = uploadImage('products', $request->main_image);
            }

            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);




            $Product = Product::create([
                'maincategory_id' => $request->maincategory_id,
                'seller_id' => $request->seller_id,
                'name' => $request->name,
                'code' => $request->code,
                'price' => $request->price,
                'discount' => $request->discount,
                'stock' => $request->quantite,
                'description' => $request->description,
                'main_image' =>  $filePath,
                'status' => $request->status,
            ]);
            $Product->colors()->attach($request->colors);


            return redirect()->route('seller.stock.products')->with(['success' => 'Ce produit a bien été ajouter au stock']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('seller.stock.products')->with(['error' => 'un prolème est survenu veuillez repeter ultérieurement']);
        }
    }


    public function edit($id)
    {
        try {
            $seller_id = Auth::user()->id;

            $product = Product::Selection()->find($id);

            if (!$product)
                return redirect()->route('seller.stock.products')->with(['error' => "Ce produit n'existe pas"]);


            $maincategories = Seller::find($seller_id)->maincategory()->orderBy('libelle')->get();
            $categories = json_decode(json_encode($maincategories));
            $colors = Color::get();

            return view('seller.stock.edit', compact('product', 'categories', 'colors'));
        } catch (\Exception $exception) {
            return $exception;
            return redirect()->route('seller.stock.products')->with(['error' => 'un prolème est survenu veuillez repeter ultérieurement']);
        }
    }



    public function update($id, ProductRequest $request)
    {
        // return $request;

        try {
            $product = Product::find($id);

            if (!$product)
                return redirect()->route('seller.stock.products')->with(['error' => "Ce produit n'existe pas"]);
            DB::beginTransaction();


            // save image
            $filePath = '';
            if ($request->has('main_image')) {
                $filePath = uploadImage('products', $request->main_image);
                Product::where('id', $id)
                    ->update([
                        'main_image' => $filePath,
                    ]);
            }


            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);




            // update date
            $Product = Product::where('id', $id)
                ->update([
                    'maincategory_id' => $request->maincategory_id,
                    'seller_id' => $request->seller_id,
                    'name' => $request->name,
                    'code' => $request->code,
                    'price' => $request->price,
                    'discount' => $request->discount,
                    'stock' => $request->quantite,
                    'description' => $request->description,
                    'status' => $request->status,
                ]);
            $product->colors()->sync($request->colors);



            DB::commit();
            return redirect()->route('seller.stock.products')->with(['success' => 'Ce produit a bien été modifier']);
        } catch (\Exception $ex) {

            DB::rollback();
            return $ex;
            return redirect()->route('seller.stock.products')->with(['error' => 'un prolème est survenu veuillez repeter ultérieurement']);
        }
    }


    public function destroy($id)
    {

        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('seller.stock.products')->with(['error' => 'د']);



            $image = Str::after($product->main_image, 'public/assets/');
            $image = base_path('public/assets/' . $image);
            unlink($image); //delete from folder
            // $maincategory->categories()->delete();
            $product->delete();
            return redirect()->back()->with(['success' => 'les images ont été ajouter avec succès']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->back()->with(['error' => 'un probléme est survenu']);
        }
    }

    public function changeStatus($id)
    {
        try {
            $product = Product::find($id);
            if (!$product)
                return redirect()->route('seller.stock.products')->with(['error' => "Ce produit n'esxite pas "]);

            $status =  $product->status  == 0 ? 1 : 0;

            $product->update(['status' => $status]);

            return redirect()->route('seller.stock.products')->with(['success' => ' le status de ce produit a bien été changer ']);
        } catch (\Exception $ex) {
            return redirect()->route('seller.stock.products')->with(['error' => 'un prolème est survenu veuillez repeter ultérieurement']);
        }
    }


    public function getFormAddImages($id)
    {

        $product = Product::with(['productImages'])->where(['id' => $id])->selection()->first();

        $productArray = json_decode(json_encode($product), true);

        return view('seller.stock.addImages')->with(compact('productArray'));
    }

    public function addImages(Request $request, $id)
    {

        try {
            if (!$request->has('status'))
                $request->request->add(['status' => 0]);
            else
                $request->request->add(['status' => 1]);

            if ($request->hasFile('images')) {
                $images = $request->file('images');


                foreach ($images as $key => $image) {
                    $filePath = uploadImage('products', $image);

                    $Product = ProductsImage::create([
                        'product_id' => $id,
                        'product_image' => $filePath,
                        'status' => $request->status
                    ]);
                }
            };
            return redirect()->route('seller.stock.product.images', $id)->with(['success' => 'les images ont été ajouter avec succès']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('seller.stock.product.images', $id)->with(['error' => 'les images ont été ajouter avec succès']);
        }
    }



    public function changeImageStatus($prod_id, $id)
    {

        try {
            $image = ProductsImage::find($id);

            if (!$image)
                return redirect()->route('seller.stock.product.images', $prod_id)->with(['error' => "cette image n'existe pas "]);

            $status =  $image->status  == 0 ? 1 : 0;

            $image->update(['status' => $status]);

            return redirect()->route('seller.stock.product.images', $prod_id)->with(['success' => ' le status de cette image a bien été changer ']);
        } catch (\Exception $ex) {
            return redirect()->route('seller.stock.product.images', $prod_id)->with(['error' => 'un prolème est survenu veuillez repeter ultérieurement']);
        }
    }

    public function destroyImage($prod_id, $id)
    {

        try {
            $product = ProductsImage::find($id);
            if (!$product)
                return redirect()->route('seller.stock.product.images')->with(['error' => "Cette image n'existe pas"]);



            $image = Str::after($product->product_image, 'public/assets/');
            $image = base_path('public/assets/' . $image);
            unlink($image); //delete from folder

            $product->delete();
            return redirect()->route('seller.stock.product.images', $prod_id)->with(['success' => 'les images ont été ajouter avec succès']);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->route('seller.stock.product.images', $prod_id)->with(['error' => 'les images ont été ajouter avec succès']);
        }
    }
}
