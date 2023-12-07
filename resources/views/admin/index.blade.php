@extends('layouts.admin')

@section('content')
<div>
    <div class="container mx-auto my-5">
        <!-- <div class="row my-5">
            <h1 class="text-center text-success fw-bolder">
                <img src="{{ asset('images/celebrate.png') }}" width="55" alt="">
                Welcome To Vienna Dream
                <img src="{{ asset('images/dream.png') }}" alt="">
            </h1>
        </div> -->
        <div class="row">
            <x-toaster />    

            <div class="table-responsive">
                <table class="w-100 mx-auto">
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
                        @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->id }}</td>

                            <td class="text-center">{{ $client->name }}</td>

                            <td class="text-center">{{ $client->email }}</td>
                            
                            <td class="text-center">{{ $client->ip_address }}</td>

                            <td class="text-center">
                                @if($client->location)
                                    <a href="{{ $client->location }}"> {{ $client->name . "'s Location" }} </a>
                                @else
                                    <!-- <button id="getLocation" class="btn btn-outline-info">Get {{ $client->name . "'s Location" }}</button> -->
                                
                                    <a id="getLocationBtn" onclick="event.preventDefault(); document.getElementById('getLocationForm').submit()" class="text-decoration-none">
                                        <div class="custom-link mx-2 rounded-pill">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1.7em" viewBox="0 0 418 515">
                                                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"
                                                    fill="green" />
                                            </svg>
                                        </div>
                                    </a>

                                    <form id="getLocationForm" action="{{ route('dashboard.getUserLocation', $client) }}" method="POST">
                                        @csrf
                                    </form>
                                @endif
                            </td>

                            <td class="text-center">{{ $client->created_at }}</td>
                            
                            <td class="text-center d-flex justify-content-center">
                                <a href="#" class="text-decoration-none">
                                    <div class="custom-link mx-2 rounded-pill">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.7em" viewBox="0 0 418 515">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"
                                                fill="cyan" />
                                        </svg>
                                    </div>
                                </a>
                                <a href="#" class="text-decoration-none">
                                    <div class="custom-link mx-2 rounded-pill">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.7em" viewBox="0 0 418 515">
                                            <path 
                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" 
                                                fill="red" />
                                        </svg>
                                    </div>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection