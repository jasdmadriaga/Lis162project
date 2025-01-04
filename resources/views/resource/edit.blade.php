<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Resource') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
   

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Resource | Edit data
    </h1>

    <form action="{{ route('resources.update', ['resource'=>$resource->resource_id])}}" method="POST">
@csrf
@method('PUT')



<label for="colStu">Resource Status</label>
    <select name="colStu" id="colStu">

    <option value="Available">Available</option>
    <option value="Unavailable">Unavailable</option>
    
    
</select>
    


<label for="colPos">Resource Type</label>

<select name="colPos" id="colPos">

<option value="Journals">Journals</option>
<option value="Encyclopedia">Encyclopedia</option>
<option value="Thesis">Thesis</option>
<option value="Newspapers">Newspapers</option>
<option value="Magazines">Magazines</option>



</select>


<button type="submit" name="action" value="cancel">Cancel</button>
<button type="submit" name="action" value="save" >Save</button>

</form>

</div>

   


            </div>
        </div>
    </div>
</x-app-layout>
