<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    /** Show product detail page */
    public function showProduct(string $slug)
    {
        $product = Product::with(['vendor', 'category', 'productImageGalleries', 'variants', 'brand'])->where('slug', $slug)->where('status', 1)->first();
        return view('frontend.pages.product-detail', compact('product'));
    }

    /** Show page products*/
    public function productsIndex(Request $request)
    {
        if ($request->has('category')) {
            $category = Category::where('slug', $request->category)->firstOrFail();
            $products = Product::where([
                'category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])

                ->when($request->has('range'), function ($query) use ($request) {
                    $price = explode(';', $request->range);
                    $from = $price[0];
                    $to = $price[1];
                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(9);
        } elseif ($request->has('subcategory')) {
            $category = SubCategory::where('slug', $request->subcategory)->firstOrFail();
            $products = Product::where([
                'sub_category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])
                ->when($request->has('range'), function ($query) use ($request) {
                    $price = explode(';', $request->range);
                    $from = $price[0];
                    $to = $price[1];
                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(9);
        } elseif ($request->has('childcategory')) {
            $category = ChildCategory::where('slug', $request->childcategory)->firstOrFail();
            $products = Product::where([
                'child_category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])
                ->when($request->has('range'), function ($query) use ($request) {
                    $price = explode(';', $request->range);
                    $from = $price[0];
                    $to = $price[1];
                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(9);
        } elseif ($request->has('brand')) {
            $brand = Brand::where('slug', $request->brand)->firstOrFail();
            $products = Product::where([
                'brand_id' => $brand->id,
                'status' => 1,
                'is_approved' => 1,
            ])
                ->when($request->has('range'), function ($query) use ($request) {
                    $price = explode(';', $request->range);
                    $from = $price[0];
                    $to = $price[1];
                    return $query->where('price', '>=', $from)->where('price', '<=', $to);
                })
                ->paginate(9);
        }

        $categories = Category::where(['status' => 1])->get();
        $brands = Brand::where(['status' => 1])->get();
        return view('frontend.pages.product', compact('products', 'categories', 'brands'));
    }

    // change List View
    public function changeListView(Request $request)
    {
        Session::put('product_list_style', $request->style);
    }
}
