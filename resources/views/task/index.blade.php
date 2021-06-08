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
                @if(session('status'))
                 {{session('status')}}
                  @endif
                <br><br>
                   My Projects<br><br>
                  <a href="{{route('tasks.create')}}"> <button class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">Add New task</button>
</a>

          </div>



          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
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
{{$tasks->links()}} <br><br><br><br>

    </div>


        </div>
      </div>





            </div>
        </div>
    </div>


</x-app-layout>
