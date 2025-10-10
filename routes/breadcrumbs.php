<?php declare(strict_types=1);

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;

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

// Posts
Breadcrumbs::for('forum.topic.post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('forum.topic', $post->topic);
    $trail->push($post->title, route('forum.topic.post', [
        'forum' => $post->topic->forum,
        'topic' => $post->topic,
        'post' => $post
    ]),
    [
        'icon' => 'fas fa-comment'
    ]);
});
