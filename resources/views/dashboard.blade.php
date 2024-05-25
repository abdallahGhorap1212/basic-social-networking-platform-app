@extends('layouts.master')

@section('content')
    @include('includs.message-block')
    <section class="row new-post">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3> what do you have to say</h3>
                <form action="{{ route('post.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </div>
                </form>
            </header>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 offset-md-3">
            <header>
                <h3> What other people say......</h3>
            </header>
            @foreach ($posts as $post)
                <article class='post' data-postid="{{ $post->id }}">
                    <p> {{ $post->body }}</p>
                    <div class="info">
                        posted by {{ $post->user->first_name }} on {{ $post->created_at }}
                    </div>
                    <div class="intercation">
                        <a href="#"
                            class=" link-offset-2 link-underline link-underline-opacity-10 like">{{ Auth::user()->likes()->where('post_id', $post->id)->first()? (Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1? 'You like this post': 'Like'): 'Like' }}</a>
                        |
                        <a href="#"
                            class="link-offset-2 link-underline link-underline-opacity-10 like">{{ Auth::user()->likes()->where('post_id', $post->id)->first()? (Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0? 'You don\'t like this post': 'Dislike'): 'Dislike' }}</a>|

                        @if (Auth::user() == $post->user)
                            <a href="#" class="link-offset-2 link-underline link-underline-opacity-10 edit">Edit</a>|
                            <a class="link-offset-2 link-underline link-underline-opacity-10"
                                href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>|
                        @endif

                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label"for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id='modal-save'>Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        var token = '{{ Session::token() }}';
        var urlEdit = '{{ route('edit') }}';
        var urlLike = '{{ route('like') }}';
    </script>
@endsection
