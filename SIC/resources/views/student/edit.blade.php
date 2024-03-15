@extends('template')

@section('body')
    <div class="gap-5 py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <p>{{ __('Edicion de Estudiantes') }} </p>
                    <a class="font-semibold text-red-500 hover:text-red-700" href="{{ route('student.index') }}">{{ __('Cancelar') }}</a>
                </div>
            </div>
        </div>

        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <form action="{{ route('student.update', $students->id) }}" class="w-full" method="post">
                        @csrf
                        @method('PUT')
                        
                        <div class="flex flex-col">
                            <label for="student_name">Nombre(s)</label>
                            <input type="text" value="{{ $students->student_name }}" 
                                class="w-full border-gray-300 rounded-md" id="student_name" name="student_name" required>
                        </div>
                        
                        @error('student_name')
                            <p class="text-red-500">
                                Ingrese un nombre valido
                            </p>
                        @enderror
                        
                        <div class="flex flex-col">
                            <label for="student_lastname">Apellido(s)</label>
                            <input type="text" value="{{ $students->student_lastname }}" 
                                class="w-full border-gray-300 rounded-md" id="student_lastname" name="student_lastname"
                                required></input>
                        </div>
                        
                        @error('student_lastname')
                            <p class="text-red-500">
                                Ingrese un apellido valido
                            </p>
                        @enderror
                        
                        <div>
                            <label for="birthDate">Fecha Nacimiento</label>
                            <input type="date" value="{{ strtotime($students->birthDate) }}"  class="w-full border-gray-300 rounded-md"
                                id="birthDate" name="birthDate" required></input>
                        </div>

                        
                        @error('birthDate')
                            <p class="text-red-500">
                                Ingrese una fecha valida
                            </p>
                        @enderror
                        
                        <div>
                            <label for="comments">Comentarios</label>
                            <input type="text" value="{{ $students->comments }}"  class="w-full border-gray-300 rounded-md"
                                id="comments" name="comments" required></input>
                        </div>


                        
                        <br>
                        <button type="submit" class="font-semibold text-blue-500 hover:text-blue-700 btn btn-primary">Actualizar Estudiante</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
