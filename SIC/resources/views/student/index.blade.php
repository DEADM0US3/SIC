@extends('template')

@section('body')

@if (session()->has('notificacion'))
    <div id="notification" class="flex flex-col w-full h-12 bg-green-400 alert alert-success rounded-t-xl ">
        <h1 class="my-auto ml-4 text-lg italic font-normal">
            {{ session('notificacion') }}
        </h1>
    </div>
@endif

<div class="gap-5 py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <p>{{ __('Students') }} </p>
                    <a class="font-semibold text-blue-500 hover:text-blue-700"
                        href="{{ route('student.create') }}">{{ __('Create') }}</a>
                </div>
            </div>
        </div>


        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <table class="w-full overflow-hidden text-sm text-left bg-white shadow-sm sm:rounded-lg">
                <thead class="text-md">
                    <tr>
                        <th class="p-6">Nombre(s)</th>
                        <th class="p-6">Apellido(s)</th>
                        <th class="p-6">Fecha Nacimiento</th>
                        <th class="p-6">Comentarios</th>
                        <th class='p-6 text-center'>Acciones</th>
                    </tr>
                </thead>
                @foreach ($students as $student)
                    <tbody class="text-gray-500 font-extralight text-md">
                        <tr>
                            <th class="p-4 px-6">{{ $student->student_name }}</th>
                            <th class="p-4 px-6">{{ $student->student_lastname }}</th>
                            <th class="p-4 px-6">{{ $student->birthDate }}</th>
                            <th class="p-4 px-6">{{ $student->comments }}</th>
                            <th>
                                <div class="flex flex-row items-center justify-center h-full gap-3 p-5">

                                    <a class="text-green-500 hover:text-green-700"
                                        href="{{ route('student.show', $student->id) }}"
                                        class="btn btn-primary btn-sm">Show</a>

                                    <a class="text-blue-500 hover:text-blue-700"
                                        href="{{ route('student.edit', $student->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 hover:text-red-700" type="submit"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                @endforeach
            </table>

            {{ $students->links() }}
        </div>

    </div>
@endsection
