<?php declare(strict_types=1);

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'), [
        'icon' => 'fas fa-home'
    ]);
});

// About
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('About', route('about'), [
        'icon' => 'fas fa-info-circle'
    ]);
});

// Contact
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Contact', route('contact'), [
        'icon' => 'fas fa-envelope'
    ]);
});

// Forums
Breadcrumbs::for('forum', function (BreadcrumbTrail $trail, Forum $forum) {
    $trail->parent('home');
    $trail->push($forum->title,
    route('forum', compact('forum')), [
        'icon' => 'fas fa-landmark'
    ]);
});

Breadcrumbs::for('forum.create', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Create Forum',
    route('forum.create'), [
        'icon' => 'fas fa-plus'
    ]);
});

// Topics
Breadcrumbs::for('forum.topic', function (BreadcrumbTrail $trail, Topic $topic) {
    $trail->parent('forum', $topic->forum);
    $trail->push($topic->title, route('forum.topic', [
        'forum' => $topic->forum,
        'topic' => $topic
    ]),
    [
        'icon' => 'fas fa-list'
    ]);
});

Breadcrumbs::for('forum.topic.create', function (BreadcrumbTrail $trail, Forum $forum) {
    $trail->parent('forum', $forum);
    $trail->push('Create Topic', route('forum.topic.create', [
        'forum' => $forum
    ]),
    [
        'icon' => 'fas fa-plus'
    ]);
});

// Posts
Breadcrumbs::for('forum.topic.post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('forum.topic', $post->topic);
    $trail->push($post->title, route('forum.topic.post', [
        'forum' => $post->forum,
        'topic' => $post->topic,
        'post' => $post
    ]),
    [
        'icon' => 'fas fa-comment'
    ]);
});

Breadcrumbs::for('forum.topic.post.create', function (BreadcrumbTrail $trail, Topic $topic) {

    $trail->parent('forum.topic', $topic);

    $trail->push('Create Post', route('forum.topic.post.create', [
        'forum' => $topic->forum,
        'topic' => $topic
    ]),
    [
        'icon' => 'fas fa-plus'
    ]);
});

// Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Profile',
        route('profile'),
    [
        'icon' => 'fas fa-user'
    ]);
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Edit',
        route('profile.edit'),
    [
        'icon' => 'fas fa-edit'
    ]);
});

Breadcrumbs::for('profile.password', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Password',
        route('profile.password'),
    [
        'icon' => 'fas fa-key'
    ]);
});

Breadcrumbs::for('profile.delete', function (BreadcrumbTrail $trail) {
    $trail->parent('profile');
    $trail->push('Delete Profile',
        route('profile.delete'),
    [
        'icon' => 'fas fa-trash-alt'
    ]);
});

// Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users',
        route('users'),
    [
        'icon' => 'fas fa-users'
    ]);
});

Breadcrumbs::for('user', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users');
    $trail->push($user->profile->username,
        route('user', compact('user')),
    [
        'icon' => 'fas fa-user'
    ]);
});
