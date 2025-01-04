<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Borrow') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">

            <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
   

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Borrow | Edit data
    </h1>

    <form action="{{ route('borrows.update', ['borrow'=>$borrow->borrow_id])}}" method="POST">
@csrf
@method('PUT')

<label for="colPos">Borrow Date</label>
    <input type="date" name="colPos" id="colPos" value="{{$borrow->borrow_date}}">

<label for="colDue">Due Date</label>
    <input type="date" name="colDue" id="colDue" value="{{$borrow->due_date}}">

<label for="colRet">Return Date</label>
    <input type="date" name="colRet" id="colRet" value="{{$borrow->return_date}}">

<label for="colOver">Overdue Date</label>
    <input type="date" name="colOver" id="colOver" value="{{$borrow->overdue_date}}">
    
<label for="colStu">Student ID No.</label>

<select name="colStu" id="colStu">
  @foreach($students as $student)
   <option value="{{ $student->student_id }}">{{ $student->name }}</option>
@endforeach
</select>













































<label for="colresource">Resource Type</label>

<select name="colresource" id="colresource">
  @foreach($resources as $resource)
   <option value="{{ $resource->resource_id }}">{{ $resource->resource_type }}</option>
@endforeach
</select>


<button type="submit" name="action" value="cancel">Cancel</button>
<button type="submit" name="action" value="save" >Save</button>

</form>

</div>

   


            </div>
        </div>
    </div>
</x-app-layout>
