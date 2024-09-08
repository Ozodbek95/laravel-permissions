<x-app-layout>
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h2 class="m-2"><b>Update Role</b></h2>
                <form action="{{ route('roles.update', $role->id) }}" method="post" class="p-10 bg-white rounded shadow-xl">
                    @csrf
                    @method('PUT')

                    <div class="form-group p-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                               value="{{$role->name}}" required>
                    </div>

                    @foreach($permissions as $permission)

                        <div class="form-group form-check m-2">

                            <input type="checkbox" value="{{$permission->id}}"
                                   @if($role->hasPermissionTo($permission->name)) checked @endif
                                   name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">

                            <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>

                        </div>

                    @endforeach

                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-primary m-2">Update Role</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
