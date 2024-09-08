<x-app-layout>
<div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-10 col-md-8 col-lg-6">
            <h2 class="m-2"><b>Update Post</b></h2>
            <form action="{{ route('posts.update', $post->id) }}" method="post" class="p-10 bg-white rounded shadow-xl">
                @csrf
                @method('PUT')

                <div class="form-group p-2">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title"
                           value="{{$post->title}}" required>
                </div>

                <div class="form-group p-2">
                    <label for="body">Body</label>
                    <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
                </div>
                <div class="form-group p-2">
                    <button type="submit" class="btn btn-primary m-2">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-app-layout>
