@extends('layouts.app')

@section('content')

<div class="bg-white p-4 w-2/3 mx-auto">
    <h2 class="text-center text-2xl">Upload your dog!</h2>

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <form action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">

            <!-- CSRF Token -->
            @csrf

            <div>
                <label for="name" class="block mb-2 text-gray-900 dark:text-gray-300">Dog name</label>
                <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your dog name..." required>
            </div>

            <div class="mt-4">
                <input type="file" name="file" required>

            </div>
            <button class="mt-4 ml-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Submit</button>
        </form>
    </div>

</div>

@endsection