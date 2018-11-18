@extends ('layouts.master')

@section ('content')

<div class="container">

    <div class="blog-header">
      <h1 class="blog-title">The Bootstrap Blog</h1>
      <p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <h1>{{ $post->title }}</h1>

            {{ $post->body }}

            <hr>

{{-- show comments list here --}}
        <div class="comments">

            <ul class="list-group">

            @foreach($post->comments as $comment)

                <li class="list-group-item">

                    <strong>
                        {{ $comment->created_at->diffForHumans() }}: &nbsp;
                    </strong>


                        {{ $comment->body }}

                </li>

            </ul>

            @endforeach

{{-- /show comments list here --}}

{{-- show comments textarea here --}}
        <div class="card">

            <div class="card-block">

                <form method="POST" action="/posts/{{ $post->id }}/comments">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" placeholder="your comment here." class="form-control" required></textarea>
                    </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
                </form>

                @include ('layouts.errors')

            </div>
        </div>
{{-- /show comments textarea here --}}

        </div>

    <nav>
        <ul class="pager">
          <li><a href="#">Previous</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </nav>

@endsection
    </div>

