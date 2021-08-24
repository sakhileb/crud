<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            People Management System (CRUD)
        </h2>
    </x-slot>

    @if($errors->any())
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{$errors->first()}}</p>
            <p class="text-sm">An email will be sent to them to notify them.</p>
        </div>
    @endif

    <div class="sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-8 gap-2 flex flex-items">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-6 col-span-3">
                <h2 class="text-3xl pb-4">Add A Person:</h2>
                <form method="POST" action="{{ route('create') }}">
                    @csrf

                    <div>
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input id="name" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div>
                        <x-jet-label for="surname" value="{{ __('Surname') }}" />
                        <x-jet-input id="surname" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="text" name="surname" :value="old('surname')" required  />
                    </div>

                    <div>
                        <x-jet-label for="id_num" value="{{ __('ID Number') }}" />
                        <x-jet-input id="id_num" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="number" name="id_num" :value="old('id_num')" required  />
                    </div>

                    <div>
                        <x-jet-label for="phone_num" value="{{ __('Mobile Number') }}" />
                        <x-jet-input id="phone_num" class="pl-2 pr-2 pb-3 pt-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="number" name="phone_num" :value="old('phone_num')" required  />
                    </div>

                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="pl-2 pr-2 pt-3 pb-3 z-10 mb-1 w-full bg-white shadow-lg max-h-56 rounded-md text-base overflow-auto sm:text-sm" type="email" name="email" :value="old('email')" required  />
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
                            {{ __('Save Contact') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-6 py-6 col-span-5">
                <h2 class="text-3xl pb-4">Current People:</h2>
                <table class="table border-separate border border-grey-800">
                    <thead>
                        <tr>
                            <th class="w-1/2 border border-grey-600">Name</th>
                            <th class="w-1/2 border border-grey-600">Surname</th>
                            <th class="w-1/2 border border-grey-600">Email</th>
                            <th class="w-1/2 border border-grey-600"></th>
                            <th class="w-1/2 border border-grey-600"></th>
                        </tr>
                    </thead>
                        @if($people)
                        @foreach($people as $user)
                            <tbody>
                                <tr>
                                    <td class="border border-grey-600">{{ $user->name }}</td>
                                    <td class="border border-grey-600">{{ $user->surname }}</td>
                                    <td class="border border-grey-600">{{ $user->email }}</td>
                                    <td class="border border-grey-600">
                                        <a href="{{ route('edit', ['id' => $user->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mx-full ml-2">Edit</a>
                                    </td>
                                    <td class="border border-grey-600">
                                        <a href="{{ route('delete', ['id' => $user->id]) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mx-full ml-2">Delete</a>
                                    </td>
                                </tr>
                        @endforeach
                    @else
                        <tr>
                            No Users Yet.
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
