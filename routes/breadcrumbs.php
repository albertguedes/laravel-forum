<?php // routes/breadcrumbs.php

// Source: https://github.com/diglactic/laravel-breadcrumbs

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

/**
 * Profile
 */
// Dashboard > Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Profile', route('profile'));
});

// Dashboard > Profile > Edit
Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Edit', route('profile.edit'));
});

 /**
  * Users
  */
// Dashboard > Users
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

// Dashboard > Users > Create
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Create', route('users.create'));
});

// Home > Users > [User]
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.index');
    $trail->push("'".$user->username."'", route('users.show', $user));
});

// Home > Users > [User] > Edit
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.show',$user);
    $trail->push("Edit", route('users.edit', $user));
});

// Home > Users > [User] > Delete
Breadcrumbs::for('users.delete', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users.show',$user);
    $trail->push("Delete", route('users.delete', $user));
});


/**
 * Posts
 */
// Dashboard > Posts
Breadcrumbs::for('posts.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});

// Dashboard > Posts > Create
Breadcrumbs::for('posts.create', function (BreadcrumbTrail $trail) {
    $trail->parent('posts.index');
    $trail->push('Create', route('posts.create'));
});

// Home > Posts > [Post]
Breadcrumbs::for('posts.show', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts.index');
    $trail->push("'".$post->title."'", route('posts.show', $post));
});

// Home > Posts > [Post] > Edit
Breadcrumbs::for('posts.edit', function (BreadcrumbTrail $trail, $post){
    $trail->parent('posts.show',$post);
    $trail->push("Edit", route('posts.edit', $post));
});

// Home > Posts > [Post] > Delete
Breadcrumbs::for('posts.delete', function (BreadcrumbTrail $trail, $post){
    $trail->parent('posts.show',$post);
    $trail->push("Delete", route('posts.delete', $post));
});

/**
 * Categories
 */
// Dashboard > Categories
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});

// Dashboard > Categories > Create
Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('categories.index');
    $trail->push('Create', route('categories.create'));
});

// Home > Categories > [Category]
Breadcrumbs::for('categories.show', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories.index');
    $trail->push("'".$category->title."'", route('categories.show', $category));
});

// Home > Categories > [Category] > Edit
Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, $categories){
    $trail->parent('categories.show',$categories);
    $trail->push("Edit", route('categories.edit', $categories));
});

// Home > Category > [Category] > Delete
Breadcrumbs::for('categories.delete', function (BreadcrumbTrail $trail, $categories){
    $trail->parent('categories.show',$categories);
    $trail->push("Delete", route('categories.delete', $categories));
});


/**
 * Tags
 */
// Dashboard > Tags
Breadcrumbs::for('tags.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});

// Dashboard > Tags > Create
Breadcrumbs::for('tags.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tags.index');
    $trail->push('Create', route('tags.create'));
});

// Home > Tags > [Tag]
Breadcrumbs::for('tags.show', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags.index');
    $trail->push("'".$tag->title."'", route('tags.show', $tag));
});

// Home > Tags > [Tag] > Edit
Breadcrumbs::for('tags.edit', function (BreadcrumbTrail $trail, $tags){
    $trail->parent('tags.show',$tags);
    $trail->push("Edit", route('tags.edit', $tags));
});

// Home > Tag > [Tag] > Delete
Breadcrumbs::for('tags.delete', function (BreadcrumbTrail $trail, $tags){
    $trail->parent('tags.show',$tags);
    $trail->push("Delete", route('tags.delete', $tags));
});

// Home > 403 Error
Breadcrumbs::for('403', function (BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push("403 Forbidden", route('403'));
});
