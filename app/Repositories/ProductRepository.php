<?php


namespace App\Repositories;

use App\Models\Products\Product;
use App\Repositories\Contractors\ProductRepositoryInterface;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function find($id)
    {
        return $this->model
            ->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                "category" => function($q){
                    $q->with('parent');
                },
            ])
            ->where('id', $id)
            ->first();
    }

    public function latest(){
        return $this->model
            ->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                "category" => function($q){
                    $q->with('parent');
                },
            ])
            ->latest()
            ->paginate(25);
    }

    public function details($slug){
        return $this->model
            ->selectRaw('
                        products.id,
                        JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                        JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'")) as productSlug,
                        JSON_UNQUOTE(JSON_EXTRACT(description, "$.'.app()->getLocale().'")) as productDesc,
                        sku,
                        price,
                        sale_price,
                        brand_id,
                        quantity,
                        category_id,
                        color_id,
                        (CASE WHEN products.id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                'color',
                'filters',
                'tags',
                'brand',
                'category' => function($q){
                    $q->with('parent');
                }
            ])
            ->whereJsonContains('slug->'.app()->getLocale(), $slug)
            ->orderBy('products.created_at')
            ->first();
    }

    public function getQuantity($id): float{
        $product = $this->find($id);
        return $product ? $product->quantity : 0;
    }

    public function getSaleProducts(){
        return $this->model
            ->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                "category" => function($q){
                    $q->with('parent');
                },
            ])
            ->whereNotNull('sale_price')
            ->where('products.price', '>', 'products.sale_price')
            ->orderBy('products.created_at')
            ->paginate(25);
    }

    public function getProductsWithFilters($category, $byParentCategory = true){
        $productsWithFilters = $this->model
            ->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        brand_id,
                        category_id,
                        color_id,
                        price,
                        sale_price,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                "category" => function($q){
                    $q->with('parent');
                },
                'brand' => function($q){
                    $q->select('id', 'name');
                },
                'color' => function($q){
                    $q->select('id', 'name', 'value');
                },
                'filters' => function($q){
                    $q->with(['parent']);
                }
            ]);

            if($byParentCategory){
                $productsWithFilters = $productsWithFilters->whereHas('category', function ($q) use($category){
                    $q->select('id')->from('categories')->whereIn('parent_id', function ($q) use($category){
                        $q->select('id')->from('categories')->whereJsonContains('slug->'.app()->getLocale(), $category);
                    });
                });
            }else{
                $productsWithFilters = $productsWithFilters->whereIn('category_id', function ($q) use ($category){
                    $q->select('id')->from('categories')->whereJsonContains('slug->'.app()->getLocale(), $category);
                });
            }

        return $productsWithFilters->paginate(25);
    }

    public function getWishlistProducts($productId){
        return $this->model->selectRaw('
                        id,
                        JSON_UNQUOTE(JSON_EXTRACT(title, "$.'.app()->getLocale().'")) as name,
                        JSON_UNQUOTE(JSON_EXTRACT(slug, "$.'.app()->getLocale().'")) as productSlug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->with([
                "category" => function($q){
                    $q->with('parent');
                },
            ])
            ->whereHas('favorite', function ($q) use($productId){
                $q->where('product_id', $productId);
            })
            ->first();
    }

    public function filter($data, $hasChildren){
        $products = $this->model->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        brand_id,
                        color_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ');
        if(isset($data['category'])){
            if($hasChildren){
                $products = $products->whereHas('category', function ($q) use($data){
                    $q->select('id')->from('categories')->whereIn('parent_id', function ($q) use($data){
                        $q->select('id')->from('categories')->whereJsonContains('slug->'.app()->getLocale(), $data['category']);
                    });
                });
            }else{
                $products = $products->whereHas('category', function ($q) use ($data){
                    $q->whereJsonContains('slug->'.app()->getLocale(), $data['category']);
                });
            }
        }
        if(isset($data['brands'])){
            $products = $products->whereHas('brand', function ($q) use ($data){
                $q->whereIn('id', $data['brands']);
            });
        }
        if(isset($data['colors'])){
            $products = $products->whereHas('color', function ($q) use ($data){
                $q->whereIn('id', $data['colors']);
            });
        }
        if(isset($data['filters'])){
            $products = $products->whereHas('filters', function ($q) use ($data){
                $q->whereIn('product_filter.filter_id', $data['filters']);
            });
        }
        if(isset($data['priceFrom'])){
            $products = $products->where('price', '>', doubleval($data['priceFrom']));
        }
        if(isset($data['priceTo'])){
            $products = $products->where('price', '<', doubleval($data['priceTo']));
        }
        if(isset($data['priceFrom']) && isset($data['priceTo'])){
            $products = $products->whereBetween('price', [$data['priceFrom'], $data['priceTo']]);
        }
        return $products->paginate(25);
    }

    public function search($term){
        return $this->model->selectRaw('
                        products.id,
                        title,
                        products.slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        brand_id,
                        color_id,
                        quantity,
                        (CASE WHEN products.id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
            ')
            ->leftJoin('categories as c1', 'c1.id', '=', 'products.category_id')
            ->leftJoin('categories as c2', 'c2.id', '=', 'c1.parent_id')
            ->whereRaw('concat(products.title, c1.name, c2.name) LIKE "%'.$term.'%"')
            ->paginate(25)
            ;
    }

    public function getBySlugWithLocalizations($slug){
        return $this->model->selectRaw('id,
                        slug as path
            ')
            ->whereJsonContains('slug->'.app()->getLocale(),$slug)
            ->first();
    }

    public function getSimilarProducts($productSlug){
        return $this->model
            ->whereJsonContains('slug->'.app()->getLocale(), $productSlug)
            ->first()->similar;
    }

    public function getByBrandId($brandId){
        return $this->model
            ->selectRaw('
                        id,
                        title,
                        slug,
                        sku,
                        price,
                        sale_price,
                        category_id,
                        brand_id,
                        color_id,
                        quantity,
                        (CASE WHEN id in (SELECT product_id from wishlist) THEN 1 ELSE 0 END) as isFavorite,
                        (CASE WHEN quantity > 0 THEN 1 ELSE 0 END) as inStock
                ')
            ->where('brand_id', $brandId)
            ->paginate(25);
    }

    public function hasPromo($id, $code){
        return $this->model
            ->where('id', $id)
            ->whereHas('category', function ($q) use($code){
                $q->whereHas('coupons', function ($q) use($code){
                    $q->where('code', $code);
                });
                $q->orWhereHas('parent', function ($q) use($code){
                    $q->whereHas('coupons', function ($q) use($code){
                        $q->where('code', $code);
                    });
                });
            })
            ->exists();
    }
}
