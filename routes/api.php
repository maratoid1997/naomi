<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Authorization\CustomerAuthController;
use App\Http\Controllers\Api\V1\Authorization\RecoveryController;
use App\Http\Controllers\Api\V1\Products\ProductController;
use App\Http\Controllers\Api\V1\Settings\MenuController;
use App\Http\Controllers\Api\V1\Products\Carts\CartController;
use App\Http\Controllers\Api\V1\Products\BrandController;
use App\Http\Controllers\Api\V1\Products\WishlistController;
use App\Http\Controllers\Api\V1\Categories\CategoryController;
use App\Http\Controllers\Api\V1\Products\FilterController;
use App\Http\Controllers\Api\V1\PageController;
use App\Http\Controllers\Api\V1\BannerController;
use App\Http\Controllers\Api\V1\SliderController;
use App\Http\Controllers\Api\V1\ApplicationFormController;
use App\Http\Controllers\Api\V1\CurrencyController;
use App\Http\Controllers\Api\V1\CampaignMailController;
use App\Http\Controllers\Api\V1\Orders\OrderController;
use App\Http\Controllers\Api\V1\Authorization\SocialAuthController;
use App\Http\Controllers\Api\V1\Settings\SettingController;


Route::prefix('v1')->group(function (){
    Route::prefix('auth')->name('auth.')->group(function (){
        Route::post('login', [CustomerAuthController::class, 'login']);
        Route::post('register', [CustomerAuthController::class, 'register']);
        Route::post('logout', [CustomerAuthController::class, 'logout']);
        Route::post('refresh', [CustomerAuthController::class, 'refresh']);
        Route::get('details', [CustomerAuthController::class, 'details']);
        Route::get('profile', [CustomerAuthController::class, 'getProfile']);
        Route::post('details/update', [CustomerAuthController::class, 'updateDetails']);
        Route::post('password/update', [CustomerAuthController::class, 'updatePassword']);
        Route::delete('delete', [CustomerAuthController::class, 'delete'])->name('delete');
        Route::name('social.')->group(function (){
            Route::post('facebook', [SocialAuthController::class, 'handleGetUserFacebook'])->name('facebook');
            Route::post('google', [SocialAuthController::class, 'handleGetUserFromGoogle'])->name('google');
        });
        Route::name('back_social.')->group(function (){
            Route::get('login/facebook', [SocialAuthController::class, 'backHandleGetUserFacebook'])->name('back_facebook')->middleware(['web']);
            Route::get('login/google', [SocialAuthController::class, 'backHandleGetUserFromGoogle'])->name('back_google')->middleware(['web']);
            Route::get('facebook/callback', [SocialAuthController::class, 'handleGetUserFromGoogle'])->name('facebookCallback');
            Route::get('google/callback', [SocialAuthController::class, 'handleGetUserFromGoogle'])->name('googleCallback');
        });
    });

    Route::post('password/forgot', [RecoveryController::class, 'forgotPassword'])->name('password.email');
    Route::post('password/reset', [RecoveryController::class, 'resetPassword']);

    Route::prefix('categories')->name('categories.')->group(function (){
//        Route::get('{categorySlug}/products', [ProductController::class, 'getByCategorySlug'])->name('products');
        Route::get('sub/{categorySlug}', [CategoryController::class,'getFilterValues'])->name('getFilterValues');
        Route::get('{categorySlug}', [CategoryController::class,'getSubCategories'])->name('children');
    });

    Route::prefix('products')->name('products.')->group(function (){
        Route::get('new', [ProductController::class,'getLatest'])->name('new');
        Route::get('sale', [ProductController::class,'getSaleProducts'])->name('sale');
        Route::get('{slug}', [ProductController::class, 'getDetails'])->name('details');
        Route::post('similar', [ProductController::class,'getSimilarProducts'])->name('similar');
    });

    Route::prefix('cart')->name('cart.')->group(function (){
        Route::post('add', [CartController::class, 'store'])->name('add');
        Route::post('sync', [CartController::class, 'sync'])->name('sync');
        Route::post('quantity/update', [CartController::class, 'updateQuantity'])->name('quantity.update');
        Route::delete('{productId}/delete', [CartController::class, 'deleteItem'])->name('items.delete');
        Route::get('/',[CartController::class, 'getCart']);
    });

    Route::prefix('wishlist')->name('wishlist')->group(function (){
        Route::get('/', [WishlistController::class,'getCustomerWishlist'])->name('getCustomerWishlist');
        Route::post('sync', [WishlistController::class, 'sync'])->name('sync');
        Route::post('add', [WishlistController::class,'create'])->name('add');
        Route::delete('{productId}/delete', [WishlistController::class,'delete'])->name('delete');
    });

    Route::prefix('settings')->name('settings.')->group(function (){
        Route::get('header', [MenuController::class, 'getHeaderMenu']);
        Route::get('locales', [SettingController::class, 'getLocales']);
        Route::get('cities', [SettingController::class, 'getCities']);
    });

    Route::prefix('brands')->name('brands.')->group(function (){
        Route::get('/', [BrandController::class, 'getAll'])->name('index');
        Route::get('{brandId}/products', [BrandController::class, 'getProducts'])->name('products');
    });

    Route::name('filters.')->group(function (){
        Route::get('search', [FilterController::class, 'search'])->name('search');
        Route::get('filter', [FilterController::class, 'filter'])->name('filter');
    });

    Route::prefix('banners')->name('banners.')->group(function (){
        Route::get('/', [BannerController::class, 'getAll']);
    });

    Route::prefix('hero-slider')->name('hero-slider')->group(function (){
        Route::get('/', [SliderController::class, 'getAll']);
    });

    Route::prefix('application-form')->name('application-form')->group(function (){
        Route::post('send', [ApplicationFormController::class, 'send'])->name('send');
    });

    Route::prefix('currency')->name('currency')->group(function (){
        Route::get('fetch', [CurrencyController::class, 'fetch'])->name('fetch');
    });

    Route::prefix('campaigns')->name('campaigns.')->group(function (){
        Route::post('email/store', [CampaignMailController::class, 'store']);
    });

    Route::prefix('order')->name('order.')->group(function (){
        Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
        Route::post('/store/express', [OrderController::class, 'storeExpress'])->name('store.express');
        Route::post('/store', [OrderController::class, 'store'])->name('store');
        Route::get('history', [OrderController::class, 'getHistory'])->name('history');
        Route::get('history/{id}', [OrderController::class, 'getOrderProducts'])->name('show');
        Route::post('approve', [OrderController::class, 'approve'])->name('approve');
        Route::post('cancel', [OrderController::class, 'cancel'])->name('cancel');
        Route::post('decline', [OrderController::class, 'decline'])->name('decline');
        Route::post('{id}/refund',[OrderController::class,'refund'])->name('refund');
    });

    Route::post('gift-certificate/validate', [OrderController::class,'validateGiftCertificate'])
        ->middleware('throttle:5,1')
        ->name('validate.gift-certificate');
    Route::post('coupon/validate', [OrderController::class,'validateCoupon'])
        ->name('validate.coupon')
        ->middleware('throttle:10,1')
    ;

    Route::prefix('pages')->name('pages')->group(function(){
        Route::get('/', [PageController::class, 'getPublishedPages'])->name('index');
        Route::get('{slug}', [PageController::class, 'getPage'])->name('pages.show');
    });

    Route::get('store/addresses', )->name('store.address');
    Route::get('contact', [PageController::class,'getContact'])->name('contact');
});


