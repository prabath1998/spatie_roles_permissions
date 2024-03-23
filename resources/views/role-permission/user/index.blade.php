<x-app-layout>


    <div class="container mx-auto px-4 mt-5 bg-white shadow overflow-hidden sm:rounded-lg">

        @if (session('status'))
        <div class="mt-3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">{{ session('status') }}</span>
          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
          </span>
        </div>
      @endif

        <div class="card shadow-md rounded-lg overflow-hidden">
            <div class="card-header bg-white-200 px-6 py-4">
                <h4 class="text-xl font-bold text-gray-800">Users</h4>
                @can('create user')
                @endcan
                <a href="{{ url('users/create') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded float-end">Add User</a>
            </div>
            <div class="card-body px-6 py-4">

                <table class="table table-bordered table-striped w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-800 font-medium">Id</th>
                            <th class="px-4 py-2 text-left text-gray-800 font-medium">Name</th>
                            <th class="px-4 py-2 text-left text-gray-800 font-medium">Email</th>
                            <th class="px-4 py-2 text-left text-gray-800 font-medium">Roles</th>
                            <th class="px-4 py-2 text-left text-gray-800 font-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-2 text-left">{{ $user->id }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-left">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $rolename)
                                    {{-- <div class="flex gap-2"> --}}
                                        <div class="center relative inline-block select-none whitespace-nowrap rounded-lg bg-pink-500 py-2 px-3.5 align-baseline font-sans text-xs font-bold uppercase leading-none text-white">
                                          <div class="mt-px">{{ $rolename }}</div>
                                        </div>

                                      {{-- </div> --}}
                                    @endforeach
                                @endif
                            </td>
                            <td class="px-4 py-2 text-left flex space-x-2">
                                @can('update user')
                                <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-success bg-green-500 hover:bg-green-700 text-white py-2 px-2 rounded">Edit</a>
                                @endcan


                                @can('delete user')
                                <a href="{{ url('users/'.$user->id.'/delete') }}" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white py-2 px-2 rounded">Delete</a>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
