<div>
    @if(count($archive)>0)
    <ul class='list-unstyled' >
        @foreach( $archive as $year => $months )
        <li>

            <h2>
                <a href="#archive-{{ $year }}" role="button"
                    data-bs-toggle="collapse"
                    aria-expanded="false"
                    aria-controls="archive-{{ $year }}" >
                    {{ $year }}
                </a>
            </h2>

            <ul id="archive-{{ $year }}" class="list collapse ps-5" >
                @foreach( $months as $month => $days )
                <li>

                    <h3>
                        <a href="#archive-{{ $year }}-{{ $month }}" role="button"
                            data-bs-toggle="collapse"
                            aria-expanded="false"
                            aria-controls="archive-{{ $year }}-{{ $month }}" >
                            {{ $month }}
                        </a>
                    </h3>

                    <ul id="archive-{{ $year }}-{{ $month }}" class="list collapse ps-5" >
                        @foreach( $days as $day => $posts )
                        <li>
                            <h4>
                                <a href="#archive-{{ $year }}-{{ $month }}-{{ $day }}" role="button"
                                    data-bs-toggle="collapse"
                                    aria-expanded="false"
                                    aria-controls="archive-{{ $year }}-{{ $month }}-{{ $day }}" >
                                    {{ $day }}
                                </a>
                            </h4>

                            <ul id="archive-{{ $year }}-{{ $month }}-{{ $day }}" class="list collapse ps-5" >
                                @foreach( $posts as $post )
                                <li class="pb-5" >
                                    <h5><a href="{{ route('post',['post'=>$post]) }}" >{{ $post->title }}</a></h5>
                                    <h6 class="text-black-50" >by <em>{{ ucwords($post->author->name) }}</em></h6>
                                </li>
                                @endforeach
                            </ul>

                        </li>
                        @endforeach
                    </ul>

                </li>
                @endforeach
            </ul>

        </li>
        @endforeach
    </ul>
    @else
        <p>No posts.</p>
    @endif
</div>
