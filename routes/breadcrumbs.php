<?php

use Diglactic\Breadcrumbs\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail){
    $trail->push('home');
});

Breadcrumbs::for('category', function ($trail, $category){
    if($category->parent){
        $trail->parent('category', $category->parent);
    }else{
        $trail->parent('home');
    }

    $trail->push($category->name, route('categories.products', $category->name));
});
