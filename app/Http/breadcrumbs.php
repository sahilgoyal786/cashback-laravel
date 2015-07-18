<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', url('home'));
});

// Home > About
Breadcrumbs::register('all_stores', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('All Stores', url('all_stores'));
});

// Home > Blog
Breadcrumbs::register('store', function($breadcrumbs,$page)
{
    $breadcrumbs->parent('all_stores');
    $breadcrumbs->push($page->name, url('stores/'.$page->slug));
});

// Home > Blog > [Category]
Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push(ucwords($category), url('categories', $category));
});

// Home > Blog > [Category] > [Page]
Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('category', $page->category);
    $breadcrumbs->push($page->title, route('page', $page->id));
});