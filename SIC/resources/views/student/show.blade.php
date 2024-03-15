@extends('template')

@section('body')
    <div class="gap-5 py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <p>{{ __('Vista de Estudiante ') }}  {{$students->student_name}}  {{$students->student_lastname}}</p>
                    <a class="font-semibold text-red-500 hover:text-red-700" href="{{ route('student.index') }}">{{ __('Cancelar') }}</a>
                </div>
            </div>
        </div>

        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    
                </div>
            </div>
        </div>


    </div>
@endsection
