<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="/img/logomd.png" alt="Logo" style="max-width: 100px" class="logo">
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <!-- Columna 1 -->
                <div>

                    <!-- Nombre tienda -->
                    <div class="mt-4">
                        <x-label for="nombretienda" value="{{ __('Nombre de la tienda') }}" />
                        <x-input id="nombretienda" class="block mt-1 w-full" type="text" name="nombretienda" :value="old('nombretienda')" autofocus autocomplete="nombretienda" />
                    </div>

                    <!-- Nombre -->
                    <div class="mt-4">
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Apellido -->
                    <div class="mt-4">
                        <x-label for="apellido" value="{{ __('Apellido') }}" />
                        <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus autocomplete="apellido" />
                    </div>

                    <!-- Email -->
                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Correo electrónico') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>



                </div>

                <!-- Columna 2 -->
                <div>

                    <!-- Direccion -->
                    <div class="mt-4">
                        <x-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
                    </div>

                    <!-- Documento -->
                    <div class="mt-4">
                        <x-label for="documento" value="{{ __('Documento') }}" />
                        <x-input id="documento" class="block mt-1 w-full" type="text" name="documento" :value="old('documento')" required autofocus autocomplete="documento" />
                    </div>

                    <!-- Tipo Documento -->
                    <div class="mt-4">
                        <x-label for="tipodocumento" value="{{ __('Tipo de Documento') }}" />
                        <select id="tipodocumento" name="tipodocumento" class="block mt-1 w-full" :value="old('tipodocumento')" required autofocus autocomplete="tipodocumento">
                            <option value="CC">CC</option>
                            <option value="CE">CE</option>
                            <option value="RC">RC</option>
                            <option value="PA">PA</option>
                            <option value="PPT">PPT</option>
                        </select>
                        <x-input-error for="tipodocumento" class="mt-2" />
                    </div>
                    <!-- Telefono -->
                    <div class="mt-4">
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                    </div>
                    <!-- Sueldo -->
                    <div class="mt-4">
                        {{-- <x-label for="sueldo" value="{{ __('Sueldo') }}" /> --}}
                        <x-input id="sueldo" class="block mt-1 w-full" type="hidden" name="sueldo" :value="old('sueldo', 0)" required autofocus autocomplete="sueldo" />
                        <x-input-error for="sueldo" class="mt-2" />
                    </div>

                    <!-- Estado -->
                    <div class="mt-4">
                        {{-- <x-label for="estado" value="{{ __('Estado') }}" /> --}}
                        <x-input id="estado" class="block mt-1 w-full" type="hidden" name="estado" :value="old('estado', 'Activo')" required autofocus autocomplete="estado" />
                        <x-input-error for="estado" class="mt-2" />
                    </div>

                </div>
            </div>

            <!-- Contraseña -->
            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirmar Contraseña -->
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('Acepto los :terms_of_service y :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Términos de Servicio').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Política de Privacidad').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <!-- Botón de registro -->
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya estás registrado?') }}
                </a>

                <x-button class="ml-4" style="background-color: rgb(209, 0, 36); color: #fff;">
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
