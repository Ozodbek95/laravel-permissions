<x-app-layout>
    <div class="container mt-4">
        <a href="{{route('users.create')}}" class="btn btn-success">Create Posts</a>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $user->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <b>Roles :</b>
                                @foreach($user->roles as $role)
                                    {{$role->name . ", "}}
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
