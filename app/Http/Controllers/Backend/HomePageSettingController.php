<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $popularCategorySection = HomePageSetting::where('key', 'popular_category_section')->first();
        $sliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();
        $sliderSectionTwo = HomePageSetting::where('key', 'product_slider_section_two')->first();
        return view(
            'admin.home-page-setting.index',
            compact('categories', 'popularCategorySection', 'sliderSectionOne', 'sliderSectionTwo')
        );
    }

    public function updatePopularCategorySection(Request $request)
    {
        $request->validate([
            'cat_one' => ['required'],
            'cat_two' => ['required'],
            'cat_three' => ['required'],
            'cat_four' => ['required'],
        ], [
            'cat_one.required' => 'Category 1 filled is required',
            'cat_two.required' => 'Category 2 filled is required',
            'cat_three.required' => 'Category 3 filled is required',
            'cat_four.required' => 'Category 4 filled is required',
        ]);

        $data =  [
            [
                'category' => $request->cat_one,
                'sub_category' => $request->sub_cat_one,
                'child_category' => $request->child_cat_one,
            ],
            [
                'category' => $request->cat_two,
                'sub_category' => $request->sub_cat_two,
                'child_category' => $request->child_cat_two,
            ],
            [
                'category' => $request->cat_three,
                'sub_category' => $request->sub_cat_three,
                'child_category' => $request->child_cat_three,
            ],
            [
                'category' => $request->cat_four,
                'sub_category' => $request->sub_cat_four,
                'child_category' => $request->child_cat_four,
            ],
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'popular_category_section'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Update successfully', 'success', 'Success');

        return redirect()->back();
    }

    public function updateProductSliderSectionOne(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'cat_one' => ['required']
        ], [
            'cat_one.required' => 'Category filled is required'
        ]);

        $data = [
            'category' => $request->cat_one,
            'sub_category' => $request->sub_cat_one,
            'child_category' => $request->child_cat_one,
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_one'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Update successfully', 'success', 'Success');

        return redirect()->back();
    }

    public function updateProductSliderSectionTwo(Request $request)
    {
        $request->validate([
            'cat_one' => ['required']
        ], [
            'cat_one.required' => 'Category filled is required'
        ]);

        $data = [
            'category' => $request->cat_one,
            'sub_category' => $request->sub_cat_one,
            'child_category' => $request->child_cat_one,
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_two'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        toastr('Update successfully', 'success', 'Success');

        return redirect()->back();
    }
}
