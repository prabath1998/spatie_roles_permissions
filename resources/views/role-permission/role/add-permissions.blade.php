<x-app-layout>

    <div class="container mx-auto px-4 mt-5 ">
        <div class="flex justify-between items-center">
            <h4 class="text-xl font-bold text-white">Role : {{ $role->name }}</h4>
            <a href="{{ url('roles') }}" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">Back</a>
        </div>
        @if (session('status'))
        <div class="mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('status') }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
          </span>
        </div>
      @endif
        <div class="card mt-4 rounded-lg  bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="card-body px-6 py-4">

                <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        @error('permission')
                        <span class="text-danger text-red-500">{{ $message }}</span>
                        @enderror

                        <label for="" class="text-gray-700 font-medium">Permissions</label>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input
                                    type="checkbox"
                                    name="permission[]"
                                    value="{{ $permission->name }}"
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                    class="mr-2 accent-blue-500"
                                />
                                <label class="text-gray-700">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
