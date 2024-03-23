<x-app-layout>
    <div class="container mx-auto px-4 mt-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h5 class="text-2xl font-bold mb-4">Create Role</h5>
            <a href="{{ url('roles') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition ease-in-out duration-150 float-right">
              Back
            </a>
          </div>
          <div class="p-6 bg-white">
            <form action="{{ url('roles') }}" method="POST" class="space-y-6">
              @csrf

              <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Role Name</label>
                <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
              </div>

              <div class="flex items-center justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>
