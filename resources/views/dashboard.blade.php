<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <div>
                    <div class="container mx-auto my-5">
                        <div class="row my-5">
                            <h1 class="text-center text-success fw-bolder">
                                <img src="{{ asset('images/celebrate.png') }}" width="55" alt="">
                                Welcome To Vienna Dream
                                <img src="{{ asset('images/dream.png') }}" alt="">
                            </h1>
                        </div>
                        <div class="row">

                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">IP Address</th>
                                            <th class="text-center">Location</th>
                                            <th class="text-center">Registered At</th>
                                            <th class="text-center">Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>

                                            <td class="text-center">{{ $user->name }}</td>

                                            <td class="text-center">{{ $user->email }}</td>
                                            
                                            <td class="text-center">{{ $user->ip_address }}</td>

                                            <td class="text-center">{{ $user->location }}</td>

                                            <td class="text-center">{{ $user->created_at }}</td>
                                            
                                            <td class="text-center d-flex justify-content-center">
                                                <div class="custom-link mx-2 rounded-pill">
                                                    <a href="#" class="text-decoration-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                            <path
                                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                                fill="cyan" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <div class="custom-link mx-2 rounded-pill">
                                                    <a href="#" class="text-decoration-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                                            <path 
                                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" 
                                                                fill="red" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
