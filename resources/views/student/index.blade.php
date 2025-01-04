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
        Student | Index
    </h1>

<span><a href="{{ route('students.create')}}">create</a></span>
    <table class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
<tr>
    <th>Student ID</th>
    <th>Name</th>
    <th>College</th>
    <th>Actions</th>
</tr>
@foreach($students as $student)
<tr>
   <td>{{ $student->student_id }}</td>
   <td>{{ $student->name }}</td> 
   <td>{{ $student->college }}</td> 
   <td class="border border-slate-300 px-4">
<a href="{{ route('students.edit', ['student'=>$student->student_id] )}}">Edit</a>
<form action="{{ route('students.destroy', ['student'=>$student->student_id]) }}" method="POST">
@csrf
@method('DELETE')

<button type="submit" name="delete" >Delete</button>

</form>
</tr>
@endforeach

</table>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
   


            </div>
        </div>
    </div>
</x-app-layout>
