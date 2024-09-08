<x-app-layout>
<div class="container mt-4">
    @if(auth()->user()->can('create post'))
        <a href="{{route('posts.create')}}" class="btn btn-success">Create Posts</a>
    @endif
    <div class="row">
        @if(auth()->user()->can('show post'))
            @foreach ($posts as $post)
            <div class="col-sm-4 mt-3">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $post->body }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            @if(auth()->user()->can('edit post'))
                                <div class="col-sm-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                       class="btn btn-primary btn-sm">Edit</a>
                                </div>
                            @endif
                            @if(auth()->user()->can('delete post'))
                                <div class="col-sm-2">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @endif
    </div>
</div>
</x-app-layout>
