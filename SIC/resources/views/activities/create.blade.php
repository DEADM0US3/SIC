@extends('template')

@section('body')
    <div class="gap-5 py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <p>{{ __('Registro de Actividades') }} </p>
                    <a class="font-semibold text-red-500 hover:text-red-700" href="{{ route('activities.index') }}">{{ __('Cancelar') }}</a>
                </div>
            </div>
        </div>

        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-row items-center justify-between p-6 text-gray-900 ">
                    <form action="{{ route('activities.store') }}" class="w-full" method="POST">
                        @csrf
                        
                        <div class="flex flex-col">
                            <label for="activities_name">Nombre(s)</label>
                            <input type="text" value="{{old('activity_name')}}" class="w-full border-gray-300 rounded-md" id="activities_name" name="activities_name" required>
                        </div>
                        @error('activity_name')
                            <p class="text-red-500">
                                Ingrese un nombre valido
                            </p>
                        @enderror
                        
                        <div>
                            <label for="comments">Porcentage</label>
                            <input type="number" value="{{old('percentage')}}" class="w-full border-gray-300 rounded-md" id="comments" name="comments" required></input>    
                        </div>
                        @error('percentage')
                            <p class="text-red-500">
                                Ingrese un nombre valido
                            </p>
                        @enderror

                        <div>
                            <label for="comments">Instrucciones</label>
                            <input type="text" value="{{old('instructions')}}" class="w-full border-gray-300 rounded-md" id="comments" name="comments" required></input>    
                        </div>
                        @error('instructions')
                            <p class="text-red-500">
                                Ingrese un nombre valido
                            </p>
                        @enderror
                        
                        <br>
                        <button type="submit" class="font-semibold text-blue-500 hover:text-blue-700 btn btn-primary">Crear Actividad</button>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
