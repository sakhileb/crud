<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            People Management System For Propay (CRUD)
        </h2>
    </x-slot>

    @if($errors->any())
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{$errors->first()}}</p>
            <p class="text-sm">A Notification Email Will BE Sent To Them.</p>
        </div>
    @endif

    <div class="sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-8 gap-2 flex flex-items">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-6 col-span-3">
                <h2 class="text-3xl pb-4">Update The Persons Details:</h2>
                <form method="POST" action="{{ route('update', ['id' => $person->id]) }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="text" name="name" value="{{ $person->name }}" required autofocus />
                    </div>

                    <div>
                        <x-jet-label for="surname" value="{{ __('Surname') }}" />
                        <x-jet-input id="surname" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="text" name="surname" value="{{ $person->surname }}" required  />
                    </div>

                    <div>
                        <x-jet-label for="id_num" value="{{ __('ID Number') }}" />
                        <x-jet-input id="id_num" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="number" name="id_num" value="{{ $person->id_num }}" required  />
                    </div>

                    <div>
                        <x-jet-label for="phone_num" value="{{ __('Mobile Number') }}" />
                        <x-jet-input id="phone_num" class="pl-2 pr-2 pb-3 pt-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="number" name="phone_num" value="{{ $person->phone_num }}" required  />
                    </div>

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="email" name="email" value="{{ $person->email }}" required  />
                    </div>

                    <div>
                        <x-jet-label for="language" value="{{ __('Language') }}" />
                        <select class="pl-2 pr-2 pt-3 pb-3 z-10 mt-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" name="language" :value="old('language')" wire:model="language" required>
                            <option value="english">English</option>
                            <option value="afrikaans">Afrikaans</option>
                            <option value="xhosa">Xhosa</option>
                            <option value="ndebele">Ndebele</option>
                            <option value="zulu">Zulu</option>
                            <option value="tswana">Tswana</option>
                            <option value="swati">Swati</option>
                            <option value="sotho">Sotho</option>
                            <option value="southern">Southern</option>
                            <option value="venda">Venda</option>
                            <option value="tsonga">Tsonga</option>
                        </select>
                    </div>

                    <div>
                        <x-jet-label for="interest" value="{{ __('Interests (Press Ctrl or CMD to Select Multiple Items)') }}" />
                        <select class="pl-2 pr-2 pt-3 z-10 mt-1 w-full " name="interest[]" :value="old('interest')" wire:model="interest" required multiple>
                            <option value="javascript">Javascript</option>
                            <option value="php">php</option>
                            <option value="html">HTML</option>
                            <option value="vuejs">VueJs</option>
                            <option value="Nodejs">NodeJs</option>
                            <option value="css">CSS</option>
                            <option value="aws">Amazon Web Services</option>
                            <option value="docker">Docker</option>
                            <option value="github">Github</option>
                            <option value="alpinejs">AlpineJs</option>
                            <option value="tailwind">Tailwind</option>
                            <option value="bootstrap">Bootstrap</option>
                        </select>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="ml-4">
                            {{ __('Update Person') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-6 col-span-5">
                <h2 class="text-2xl pb-4 text-center">The CRUD "Update" Part Of The System:</h2>
                <p class="text-center pt-10 pb-10">
                    CRUD Meaning: CRUD is an acronym that comes from the world of computer programming and refers to the four functions that are considered necessary to implement a persistent storage application: create, read, update and delete.
                </p>
                <p class="text-center">
                    Right now you are looking at a visual representation of the "U" in CRUD;
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
