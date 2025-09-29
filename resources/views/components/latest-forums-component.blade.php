<div class="col-12 pb-5" >

@if(count($latest_forums)>0)
    @foreach( $latest_forums as $forum )
    <div class="card mb-5" >
        <div class="card-header" >
            <div class="row" >
                <div class="col-1 d-flex align-items-center" >
                    <i class="fas fa-landmark fs-1" ></i>
                </div>
                <div class="col-11 ps-4" >
                    <h2>
                        <a href="{{ route('forum',compact('forum')) }}" >
                            {{ $forum->title }}
                        </a>
                    </h2>
                    <h6 class="text-black-50" >
                        <i class="fas fa-calendar-alt"></i> {{ $forum->created_at->format("Y M d") }} by
                    </h6>
                </div>
            </div>
        </div>
        <div class="card-body" >
            {{ $forum->description }}
            <p class="fs-5 mt-3 text-center" >
                <a class="btn btn-info" href="{{ route('forum', compact('forum')) }}" >
                    <i class="fas fa-arrow-alt-circle-right"></i> ENTER
                </a>
            </p>
        </div>
    </div>
    @endforeach
    <div class="d-flex justify-content-center pt-5">
        {!! $latest_forums->links() !!}
    </div>
@else
    <p>No forums.</p>
@endif
</div>
