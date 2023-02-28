<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\BannerAds;
use App\models\product\Product;
use App\models\product\Category;
use App\models\blog\Blog;
use App\models\product\TypeProduct;
use App\models\construction\Construction;
use App\models\product\ProductBrands;
use App\models\product\ProductCombo;
use  App\models\product\TypeProductTwo;
use Session;

class ProductController extends Controller
{
    public function allProduct()
    {
        $data['brands'] = ProductBrands::where('status', 1)->get();
        $data['list'] = Product::where(['status'=>1])->orderBy('id','DESC')->select('id','category','name','discount','price','price_big','images','slug','cate_slug','type_slug', 'size', 'description')
        ->paginate(9);
        $data['title'] = "Tất cả sản phẩm";
        return view('product.list',$data);
    }

    public function allListCate($cate)
    {
        $data['list'] = Product::where(['status'=>1,'cate_slug'=>$cate])
        ->orderBy('id','DESC')
        ->select('id','category','name','discount','price','price_big','images','slug','cate_slug','type_slug', 'size', 'description')
        ->paginate(9);
        $data['cateno'] = Category::where('slug',$cate)->first(['id','name','avatar','content','slug','imagehome']);
        $allBrands = ProductBrands::where('status', 1)->get();
        $listBrand = [];
        $cate_id = $data['cateno']->id;
        foreach ($allBrands as $key => $brand) {
            foreach (json_decode($brand->cate_id) as $key => $cate) {
                if ($cate == $cate_id) {
                    $listBrand[] = $brand;
                }
            }
        }
        $data['brands'] = $listBrand;
        $data['cate_id'] = $cate_id;
        $data['title'] = languageName($data['cateno']->name);
        $data['content'] = $data['cateno']->content;
        $data['bannerCate'] = $data['cateno']->avatar;
        return view('product.list',$data);
    }
    public function allListType($cate,$typecate){
        $data['list'] = Product::where(['status'=>1,'cate_slug'=>$cate,'type_slug'=>$typecate])
        ->orderBy('id','DESC')
        ->select('id','category','name','discount','price','price_big','images','slug','cate_slug','type_slug','description', 'size')
        ->paginate(9);
        $data['pronew'] = Product::where('status',1)->orderBy('id','DESC')->select('id','category','name','discount','price','images','slug','cate_slug','type_slug', 'size')
        ->paginate(5);
        $data['cateno'] = TypeProduct::where(['slug'=>$typecate, 'cate_slug'=>$cate])->first(['id','name','cate_id','content', 'avatar']);
        $cate_id = $data['cateno']->cate_id;
        $allBrands = ProductBrands::where('status', 1)->get();
        $listBrand = [];
        foreach ($allBrands as $key => $brand) {
            foreach (json_decode($brand->cate_id) as $key => $cate) {
                if ($cate == $cate_id) {
                    $listBrand[] = $brand;
                }
            }
        }
        $data['brands'] = $listBrand;
        $data['title'] = languageName($data['cateno']->name);
        $data['cateid'] = 0;
        $data['content'] = $data['cateno']->content;
        $data['type_id'] = $data['cateno']->id;
        return view('product.list',$data);
    }
    public function allListTypeTwo($cate,$typecate,$typetwo){
        $data['list'] = Product::where(['status'=>1,'cate_slug'=>$cate,'type_slug'=>$typecate,'type_two_slug'=>$typetwo])
            ->orderBy('id','DESC')
            ->select('id','category','name','discount','price','price_big','images','slug','cate_slug','type_slug','description','size')
            ->paginate(12);
        $data['type'] = TypeProductTwo::where('slug',$typetwo)->first(['id','name','cate_id','content']);
        $cate_id = $data['type']->cate_id;
        $data['typeCate'] = TypeProduct::where([
            ['status', '=', 1],
            ['cate_id', '=',$cate_id]
        ])->orderBy('id','DESC')
        ->get(['cate_id','id', 'name','avatar']);
        $allBrands = ProductBrands::where('status', 1)->get();
        $listBrand = [];
        foreach ($allBrands as $key => $brand) {
            foreach (json_decode($brand->cate_id) as $key => $cate) {
                if ($cate == $cate_id) {
                    $listBrand[] = $brand;
                }
            }
        }
        $data['brands'] = $listBrand;
        $data['title'] = languageName($data['type']->name);
        $data['content'] = $data['type']->content;
        return view('product.list',$data);
    }

    public function CateProList($cate)
    {
        $data['list'] = Product::with('customer','cate')
        ->where('category',$cate)
        ->orderBy('id','ASC')
        ->paginate(12);
        $data['cate'] = Category::where('id',$cate)->first();
        return view('product.list',$data);
    }
    public function TypeProList($type)
    {
        $data['list'] = Product::with('customer','cate')
        ->where('type_cate',$type)
        ->orderBy('id','ASC')
        ->paginate(12);
        $cate = TypeProduct::where('id',$type)->first();
        $data['title_page'] = languageName($cate->name);
        return view('product.list',$data);
    }
    public function getproajax(Request $request)
    {
        if($request->cate == "all"){
            $product = Product::where([
                ['status', '=', 1]
            ])->limit(9)->orderBy('id','ASC')->get(['id','name','discount','price','images']);
        }else{
            $product =  Product::where(['status'=>1,'category'=>$request->cate])
            ->orderBy('id','DESC')
            ->select('id','category','name','discount','price','images')
            ->get();
        }
        $view = view("layouts.product.getproajax",compact('product'))->render();
        return response()->json(['html'=>$view]);
    }
    public function filterProduct(Request $request)
    {
        $product = Product::query()->where('status',1);
        if($request->cate != null){
            if(isset($request->price)){
                if($request->price == '0-100'){
                    $product = $product->where('category',$request->cate)->where('price', '<', 100000);
                }elseif($request->price == '100-200'){

                    $product = $product->where('category',$request->cate)->whereBetween('price', [100000, 200000]);
                    
                }elseif($request->price == '200-500'){
                    $product = $product->where('category',$request->cate)->whereBetween('price', [200000, 500000]);
                }elseif($request->price == '500-1000'){
                    $product = $product->where('category',$request->cate)->whereBetween('price', [500000, 1000000]);
                }elseif($request->price == '1000-2000'){
                $product = $product->where('category',$request->cate)->whereBetween('price', [1000000, 2000000]);
                 }
                 elseif($request->price == '>2000'){
                    $product = $product->where('category',$request->cate)->where('price', '>', 2000000);
                     }
                else{
                    $product = $product->where('category',$request->cate);
                }
            }
        }else{
            if(isset($request->price)){
                if($request->price == '0-100'){
                    $product = $product->where('type_cate',$request->type)->where('price', '<', 100000);
                }elseif($request->price == '100-200'){
                    $product = $product->where('type_cate',$request->type)->whereBetween('price', [100000, 200000]);
                }elseif($request->price == '200-500'){
                    $product = $product->where('type_cate',$request->type)->whereBetween('price', [200000, 500000]);
                }elseif($request->price == '500-1000'){
                    $product = $product->where('type_cate',$request->type)->whereBetween('price', [500000, 1000000]);
                }elseif($request->price == '1000-2000'){
                $product = $product->where('type_cate',$request->type)->whereBetween('price', [1000000, 2000000]);
                 }
                 elseif($request->price == '>2000'){
                    $product = $product->where('type_cate',$request->type)->where('price', '>', 2000000);
                     }
                else{
                    $product = $product->where('type_cate',$request->type);
                }
            }
        }
        $products = $product->get();
        $view7 = view('layouts.product.locprice',compact('products'))->render();
        return response()->json(['html7'=>$view7]);
    }
    public function detail_product($cate,$slug)
    {
        $data['product'] = Product::with([
            'typeCate' => function ($query) {
                $query->select('id', 'name','avatar','slug'); 
            },
            'cate' => function ($query) {
                $query->where('status',1)->limit(5)->select('id','name','avatar','slug'); 
            },
        ])->where(['slug'=>$slug, 'status'=>1])->first(['id','name','images','type_cate','category','sku','discount','price','price_big','content','size','description','slug','preserve','cate_slug','type_slug','status', 'brand_id']);
        $data['news'] = Blog::where(['status'=>1,'home_status'=>1])->orderby('id','desc')->limit(8)->get(['id','title','image','description','created_at','slug']);
        $data['productlq'] = Product::where(['cate_slug'=>$cate, 'status'=>1])->select('id','name','images','type_cate','category','sku','discount','price','content','size','description','slug','preserve','cate_slug','type_slug','status')->paginate(6);
        $viewoldpro = session()->get('viewoldpro', []);
        if(isset($viewoldpro[$slug])) {
            session()->put('viewoldpro', $viewoldpro);
        } else {
            $viewoldpro[$slug] = [
                "idpro" => $data['product']->id,
                "name" => $data['product']->name,
                "image" => json_decode($data['product']->images)[0],
                "cate_slug" => $data['product']->cate_slug,
                "type_slug" => $data['product']->type_slug,
                "slug" => $data['product']->slug, 
                "discount" => $data['product']->discount,
                "price" => $data['product']->price, 
            ];
        }
        
        session()->put('viewoldpro', $viewoldpro);
        return view('product.detail',$data);
    }
    public function compare(Request $request)
    {
//         $request->session()->flush();
// return;
        $id = $request->id;
        $data['product'] = Product::where('id',$id)->first(['id','name','images','category','discount','price','size']);
        $compare = session()->get('compareProduct', []);
        if(isset($compare[$id])) {
            session()->put('compareProduct', $compare);
            return response()->json([
                'message' => 'exist'
            ]);
        }
        else {
            if(empty($compare)){
                $compare[$id] = [
                    "idpro" => $id,
                    "name" => $data['product']->name,
                    "cate" => $data['product']->category,
                    "discount" => $data['product']->discount,
                    "price" => $data['product']->price,
                    "size" => $data['product']->size,
                    "image" => json_decode($data['product']->images)[0]
                ];
            }else{
                foreach($compare as $val){
                    if($data['product']->category != $val['cate']){
                        return response()->json([
                            'data'=> [],
                            'message' => 'error'
                        ]);
                    }
                }
                if(count($compare) == 3){
                    return response()->json([
                        'data'=> [],
                        'message' => 'limit3'
                    ]);
                }
                $compare[$id] = [
                    "idpro" => $id,
                    "name" => $data['product']->name,
                    "cate" => $data['product']->category,
                    "discount" => $data['product']->discount,
                    "price" => $data['product']->price,
                    "size" => $data['product']->size,
                    "image" => json_decode($data['product']->images)[0]
                ];
            }
            session()->put('compareProduct', $compare);
            $compareProduct = session()->get('compareProduct', []);
            
            return response()->json([
                'data'=> $compareProduct,
                'qty'=> count($compareProduct),
                'message' => 'success'
            ]);
            
        }
        
    }
    public function removeCompare(Request $request)
    {
        if($request->id) {
            $compare = session()->get('compareProduct');
            if(isset($compare[$request->id])) {
                unset($compare[$request->id]);
                session()->put('compareProduct', $compare);
            }
            $list = session()->get('compareProduct', []);
            $view = view("layouts.product.compare",compact('list'))->render();
            return response()->json(['html'=>$view]);
        }

        
    }
    public function compareList()
    {
        $data['list'] = session()->get('compareProduct', []);
        return view('compare.product',$data);
    }
    public function search_product(Request $request)
    {
        $language_current = Session::get('locale');
        $keyword = $request->keyword;
        $data['product'] = Product::where(['language'=>$language_current])
        ->where('name', 'LIKE', '%'.$keyword.'%')
        ->paginate(12);
        return view('product.search',$data);
    }
    
    public function listCatePro(Request $request)
    {
        $id = $request->id;
        if ($id == 0) {
            $data['list'] = Product::where(['status'=>1])->orderBy('id','DESC')->select('id','category','name','discount','price','images','slug','cate_slug','type_slug', 'size', 'description')
            ->paginate(24);
        } else {
            $data['list'] = Product::where(['status'=>1, 'category'=>$id])->orderBy('id','DESC')->select('id','category','name','discount','price','images','slug','cate_slug','type_slug', 'size', 'description')
            ->paginate(24);
        }
        
        $html = view('product.list-cate-product', $data)->render();
        return response()->json([
            'status' => 200,
            'html' => $html,
        ]);
    }

    public function listSale()
    {
        $data['bannerAdsSale'] = BannerAds::where('status', 2)->get(['name', 'image']);
        $data['products'] = Product::where(['status'=>1])->where('discount', '>', 0)->select('id','category','name','discount','price','images','slug','cate_slug','type_slug', 'size', 'description')
        ->paginate(12);
        return view('product.list-product-sale', $data);
    }

    public function quickview(Request $request)
    {
        $id = $request->id;
        $data['product'] = Product::with('brand')->findOrFail($id);
        $view = view('layouts.product.quickview', $data)->render();
        return response()->json([
            'html' => $view
        ]);
    }
}
