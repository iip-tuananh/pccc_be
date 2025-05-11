<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $cartItems = \Cart::getContent();
        $totalPriceCart = \Cart::getTotal();

        // danh mục sản phẩm
        $categories = Category::query()->where('parent_id', 0)->orderBy('sort_order')->get();

        // danh mục blog
        $postsCategory = PostCategory::query()
            ->where('type', PostCategory::TYPE_POST)
            ->where('parent_id', 0)->orderBy('sort_order')->get();

        $categoriesProject = PostCategory::query()->whereHas('projects', function($q) {
                $q->where('status', 1);
            })
            ->where('type', PostCategory::TYPE_PROJECT)->orderBy('sort_order', 'asc')->get();

        $categoriesService = PostCategory::query()
            ->with(['childs' => function($q) {
                $q->whereHas('services', function ($q) {
                    $q->where('status', 1);
                })
                ->orderBy('sort_order', 'asc');
            }])
            ->where('parent_id', 0)
            ->where('type', PostCategory::TYPE_SERVICE)
            ->whereHas('childs', function($q) {
                $q->whereHas('services', function ($q) {
                    $q->where('status', 1);
                });
            })
            ->orderBy('sort_order', 'asc')
            ->get();

        $categoriesknoweg = PostCategory::query()
            ->with(['childs' => function($q) {
                $q->orderBy('sort_order', 'asc');
            }])
            ->where('parent_id', 0)
            ->where('type', PostCategory::TYPE_KIENTHUC)->orderBy('sort_order', 'asc')->get();


        $categoriesAbout = PostCategory::query()->where('parent_id', 0)
            ->has('posts')
            ->where('type', PostCategory::TYPE_ABOUT)->orderBy('sort_order', 'asc')->get();


        $view->with(['config' => $config, 'cartItems' => $cartItems, 'totalPriceCart' => $totalPriceCart, 'categories' => $categories,
            'postsCategory' => $postsCategory, 'categoriesProject' => $categoriesProject, 'categoriesService' => $categoriesService,
            'categoriesknoweg' => $categoriesknoweg, 'categoriesAbout' => $categoriesAbout
        ]);
    }
}
