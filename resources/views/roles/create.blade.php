<x-app-layout>

    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                <h3 class="mb-2">Add a Role</h3>
                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="title" name="name" value="{{old('name')}}" required>
                    </div>

                    @foreach($permissions as $permission)

                        <div class="form-group form-check">

                            <input type="checkbox" value="{{$permission->id}}"
                                   name="permissions[]" class="form-check-input" id="exampleCheck{{$permission->id}}">

                            <label class="form-check-label" for="exampleCheck{{$permission->id}}">{{$permission->name}}</label>

                        </div>

                    @endforeach

                    <br>
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
