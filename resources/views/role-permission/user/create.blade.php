<x-app-layout>

    <div class="container mx-auto px-4 mt-5">
      <div class="flex justify-between">
        <h4 class="text-2xl font-semibold mb-4 text-white">Create User</h4>
        <a href="{{ url('users') }}" class="btn btn-danger bg-red-500 hover:bg-red-700 text-white py-2 px-2 rounded">Back</a>
      </div>

      @if ($errors->any())
        <ul class="alert alert-warning">
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      @endif

      <div class="card bg-gray-100 shadow-md rounded">
        <div class="card-body px-6 pt-6 pb-8">
          <form action="{{ url('users') }}" method="POST">
            @csrf

            <div class="mb-4">
              <label for="name" class="text-sm block font-medium mb-2">Name</label>
              <input type="text" id="name" name="name" class="form-control w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
              <label for="email" class="text-sm block font-medium mb-2">Email</label>
              <input type="text" id="email" name="email" class="form-control w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
              <label for="password" class="text-sm block font-medium mb-2">Password</label>
              <input type="text" id="password" name="password" class="form-control w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
              <label for="roles" class="text-sm block font-medium mb-2">Roles</label>
              <select name="roles[]" id="roles" class="form-control w-full rounded-md border border-gray-300 px-3 py-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" multiple>
                <option value="">Select Role</option>
                @foreach ($roles as $role)
                  <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-0">
              <button type="submit" class="btn btn-primary px-4 py-2 rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </x-app-layout>
