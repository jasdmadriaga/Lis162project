<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
   

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Student | Create
    </h1>

    <form action="{{ route('students.store')}}" method="POST">
@csrf


<label for="colName">Name</label>
    <input type="text" name="colName" id="colName">
  
<label for="colPos">College</label>
    <input type="text" name="colPos" id="colPos">   


<button type="submit" name="action" value="cancel">Cancel</button>
<button type="submit" name="action" value="save" >Save</button>

</form>

</div>

   


            </div>
        </div>
    </div>
</x-app-layout>