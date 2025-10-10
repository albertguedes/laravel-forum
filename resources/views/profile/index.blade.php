@extends('layouts.main')
@section('title', strtoupper(auth()->user()->profile->username))
@section('description',auth()->user()->profile->bio)
@section('content')
<div class="p-3 mb-5 bg-white row" >

    <div class="col-12">
        {{ Breadcrumbs::render('profile') }}
    </div>

    <div class="pb-4 col-12">
        <h1 class="pb-3 text-uppercase" >{{ auth()->user()->profile->username }}</h1>
        <h6 class="text-black-50" >Registered since <em>{{ auth()->user()->created_at->format("Y M d") }}</em></h6>
    </div>

    <div class="pb-4 col-12">
        <a href="{{ route('profile.edit') }}" class="btn btn-info fw-bolder" >
            <i class="far fa-edit"></i> Edit Profile
        </a>
        <a href="{{ route('profile.password') }}" class="btn btn-info fw-bolder" >
            <i class="fas fa-key"></i> Change Password
        </a>
        <a href="{{ route('profile.delete') }}" class="btn btn-danger fw-bolder" >
            <i class="fas fa-trash-alt"></i> Delete Profile
        </a>
    </div>

    <div class="pb-4 col-4" >
        <dl class="mt-3 row border-top-light">
            <dt><i class="fas fa-user"></i> Name</dt>
            <dd class="mb-3" >{{ auth()->user()->profile->name() }}</dd>

            <dt><i class="fas fa-venus-mars"></i> Gender</dt>
            <dd class="mb-3">{{ auth()->user()->profile->gender ? 'Male' : 'Female' }}</dd>

            <dt><i class="fas fa-birthday-cake"></i> Birth Date</dt>
            <dd class="mb-3">{{ auth()->user()->profile->birth_date }}</dd>

            <dt><i class="fas fa-envelope"></i> Email</dt>
            <dd class="mb-3">{{ auth()->user()->email }}</dd>
        </dl>
    </div>

    <div class="pt-3 pb-4 col-8" >
        <strong><i class="fas fa-address-card"></i> Bio</strong>
        <br>
        {{ auth()->user()->profile->bio }}
    </div>

</div>

<div class="bg-white row" >
    <div class="py-3 col-12" >

        <ul class="nav nav-tabs" id="userTab" role="tablist" >
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="forums-tab" data-bs-toggle="tab" data-bs-target="#forums-tab-pane" type="button" role="tab" aria-controls="forums-tab-pane" aria-selected="true">
                    <i class="fas fa-landmark"></i> Forums ({{ auth()->user()->forums->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="topics-tab" data-bs-toggle="tab" data-bs-target="#topics-tab-pane" type="button" role="tab" aria-controls="topics-tab-pane" aria-selected="false">
                    <i class="fas fa-list"></i> Topics ({{ auth()->user()->topics->count() }})
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts-tab-pane" type="button" role="tab" aria-controls="posts-tab-pane" aria-selected="false">
                    <i class="fas fa-comments"></i> Posts ({{ auth()->user()->posts->count() }})
                </button>
            </li>
        </ul>

        <div class="tab-content" id="userTabContent">

            <div class="bg-white tab-pane fade tabroller show active" id="forums-tab-pane" role="tabpanel" aria-labelledby="forums-tab" tabindex="0">
                @php $count = 1 @endphp
                @if($forums)
                <table class="table overflow-hidden table-hover">
                    <tbody>
                        @foreach($forums as $forum)
                        <tr>
                            <td class="text-center align-middle fs-6 text-gray" >#{!! $count++ !!}</td>
                            <td class="ps-3 py-4 {{ !$forum->is_active ?? 'text-muted' }}" >
                                <a href="{{ route('forum', compact('forum')) }}" class="@if(!$forum->is_active) text-muted @endif">
                                    {{ $forum->title }}
                                </a>
                                <br>
                                <span class="text-black-50 fs-6" >
                                    <i class="fas fa-calendar"></i> {{ $forum->created_at->format("Y M d") }}
                                    | {{ $forum->topics_count }} topics
                                    | {{ $forum->posts_count }} posts
                                </span>
                            </td>
                            <td class="text-center align-middle fs-6" >
                                @if($forum->is_active)
                                <span class="text-success" >Active</span>
                                @else
                                <span class="text-danger" >Not Active</span>
                                @endif
                            </td>
                            <td class="text-center align-middle" >
                                <a class="btn btn-sm btn-warning" href="{{ route('forum.edit', compact('forum')) }}" title="Edit Forum" >
                                    <i class="fas fa-edit fs-5"></i>
                                </a>

                                <a class="btn btn-sm btn-danger" href="{{ route('forum.destroy', compact('forum')) }}" title="Delete Forum" >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No forums</p>
                @endif
            </div>

            <div class="bg-white tab-pane fade tabroller" id="topics-tab-pane" role="tabpanel" aria-labelledby="topics-tab" tabindex="1">
                @if($topics)
                <table class="table table-hover">
                    <tbody>
                        @php $count = 1; @endphp
                        @foreach($topics as $topic)
                        <tr>
                            <td class="text-center align-middle fs-6 text-gray" >#{!! $count++ !!}</td>
                            <td class="ps-3 py-4 {{ !$topic->is_active ?? 'text-muted' }}" >
                                <a href="{{ route('forum.topic', [ 'forum' => $topic->forum, 'topic' => $topic ]) }}" class="@if(!$topic->is_active) text-muted @endif">
                                    {{ $topic->title }}
                                </a>
                                <br>
                                <span class="text-black-50 fs-6" >
                                    <i class="fas fa-calendar"></i> {{ $topic->created_at->format("Y M d") }}
                                    | {{ $topic->posts_count }} posts
                                </span>
                            </td>
                            <td class="text-center align-middle fs-6" >
                                @if($topic->is_active)
                                <span class="text-success" >Active</span>
                                @else
                                <span class="text-danger" >Not Active</span>
                                @endif
                            </td>
                            <td class="text-center align-middle" >
                                <a class="btn btn-sm btn-warning" href="{{ route('forum.topic.edit', [ 'forum' => $topic->forum, 'topic' => $topic ]) }}" title="Edit Topic" >
                                    <i class="fas fa-edit fs-5"></i>
                                </a>

                                <a class="btn btn-sm btn-danger" href="{{ route('forum.topic.destroy', [ 'forum' => $topic->forum, 'topic' => $topic ]) }}" title="Delete Topic" >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No topics</p>
                @endif
            </div>

            <div class="bg-white tab-pane fade tabroller" id="posts-tab-pane" role="tabpanel" aria-labelledby="posts-tab" tabindex="2">
                @if($posts)
                <table class="table table-hover">
                    <tbody>
                        @php $count = 1 @endphp
                        @foreach($posts as $post)
                        <tr>
                            <td class="text-center align-middle fs-6 text-gray" >#{!! $count++ !!}</td>
                            <td class="ps-3 py-4 {{ !$post->published ?? 'text-muted' }}" >
                                <a href="{{ route('forum.topic.post', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post ]) }}" class="@if(!$post->published) text-muted @endif">
                                    {{ $post->title }}
                                </a>
                                <br>
                                <span class="text-black-50 fs-6" >
                                    <i class="fas fa-calendar"></i> {{ $post->created_at->format("Y M d") }}
                                    | {{ $post->children_count }} replies
                                </span>
                            </td>
                            <td class="text-center align-middle fs-6" >
                                @if($post->published)
                                <span class="text-success" >Active</span>
                                @else
                                <span class="text-danger" >Not Active</span>
                                @endif
                            </td>
                            <td class="text-center align-middle" >
                                <a class="btn btn-sm btn-warning" href="{{ route('forum.topic.post.edit', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post ]) }}" title="Edit Post" >
                                    <i class="fas fa-edit fs-5"></i>
                                </a>
                            </td>
                            <td class="text-center align-middle" >
                                <a class="btn btn-sm btn-danger" href="{{ route('forum.topic.post.destroy', [ 'forum' => $post->topic->forum, 'topic' => $post->topic, 'post' => $post ]) }}" title="Delete Post" >
                                    <i class="fas fa-trash-alt fs-5"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>No posts</p>
                @endif
            </div>

        </div>
    </div>
</div>
@endsection
