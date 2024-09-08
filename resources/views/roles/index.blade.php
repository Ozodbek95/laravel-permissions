<x-app-layout>
    <div class="container mt-4">
        <a href="{{route('roles.create')}}" class="btn btn-success">Create Role</a>
        <div class="row">
            @foreach ($roles as $role)
                <div class="col-sm-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $role->name }}</h5>
                        </div>
                        <div class="card-body">
                            <b>Permissions:</b>
                            @foreach($role->permissions as $permission)
                                <i>{{$permission->name . ", "}}</i>
                            @endforeach
                        </div>
                        <div class="card-footer text-muted">
                            <div class="row">
                                <div class="col-sm-2">
                                    <a href="{{ route('roles.edit', $role->id) }}"
                                       class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm-2">
                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
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
