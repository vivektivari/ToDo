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
      <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{asset('storage/images/'.$project->image)}}" width="400px">
      <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">

        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1"> {{ $project['title'] }}    </h1>
        <div class="flex mb-4">



          </span>
        </div>
        <p class="leading-relaxed">{{ $project['detail'] }}</p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">


        </div>

      </div>
    </div>


    <br><br>
    Task index<br><br>
   <a href="{{route('tasks.create')}}"> <button class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Add New task</button>
    <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Project Title</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Option</th>


          </tr>
        </thead>
        <tbody>



            @foreach($tasks as $task)
<tr>
       <td class="px-4 py-3">     {{$task->title}} </td>
       <td class="px-4 py-3">
       <a href="{{route('tasks.show',$task->id)}}">VIEW</a>
       <a href="{{route('tasks.edit',$task->id)}}">EDIT</a>
      <form action="{{route('tasks.destroy',$task->id)}}" method="POST">
      @method('DELETE')
      @csrf
      <button type="submit">DELETE</button>
      </form>
       </td>
       </tr>

            @endforeach



        </tbody>
      </table><br>
      <br><br><br>
  </div>
</section>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
