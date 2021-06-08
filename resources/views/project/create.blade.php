<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Add A New Project
                </div>
            </div>
            
        </div>
    </div>

    <section class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-col px-5 py-24 justify-center items-center">
  <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>



      <div class="relative mb-4">
      <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">  
      
      @csrf    
      
        <label class="leading-7 text-sm text-gray-600">Project Title</label>
        <input type="text" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
       
      </div> <span style="color:red;">    @error('title')
        {{$message}}
        @enderror </span><br><br>
      <div class="relative mb-4">
        <label  class="leading-7 text-sm text-gray-600">Project Detail</label>
        <textarea  id="detail" name="detail" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </textarea></div>
      <span style="color:red;">
      @error('detail')
        {{$message}}
        @enderror 
        </span><br> <br>
      <div class="relative mb-4">
        <label  class="leading-7 text-sm text-gray-600">Featured Image</label>
        <input type="file" id="image" name="image" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div><span style="color:red;">    @error('image')
        {{$message}}
        @enderror </span><br><br>
      
      <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Add Project</button>
      </form>
  </div>
</section>
</x-app-layout>
