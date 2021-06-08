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
            




                <section class="text-gray-600 body-font overflow-hidden">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{asset('storage/images/'.$task->image)}}" width="400px"4>
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"> {{ $task['title'] }}    </h1>
        <div class="flex mb-4">
          
           
           
          </span>
        </div>
        <p class="leading-relaxed">{{ $task['detail'] }}</p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
          
          
        </div>
      
      </div>
    </div>
  </div>
</section>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
