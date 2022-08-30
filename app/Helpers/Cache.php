<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Redis;

class Cache
{
    // prefix constants
    const WISHLIST = "wishlist";
    const PAGES = "pages";
    const PRODUCTS = "products";
    const MENUS = "menus";
    const CATEGORIES = "categories";
    const CART = "cart";
    const CART_ITEMS = "cartItems";
    const SEARCH = "search";
    const FILTER = "filter";
    const BANNERS = "banners";
    const SLIDERS = "sliders";
    const USER = "user";
    const CUSTOMER = "customer";

    public static function delete($key): void{
        foreach (Redis::keys("{$key}*") as $dKey){
            $dKey = substr($dKey, strlen(env('REDIS_PREFIX')));
            Redis::del($dKey);
        }
    }

    public static function get($key){
        return json_decode(Redis::get("{$key}"));
    }

    public static function remember($key, $data){
        Redis::set($key, $data);

        return self::get($key);
    }

    public static function has($key){
        return Redis::exists($key);
    }

    public static function doesNotHave($key): bool
    {
        return !Redis::exists($key);
    }
}
