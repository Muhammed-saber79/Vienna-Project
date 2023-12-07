@extends('layouts.user')

@section('content')
<div class="content">
    <div class="container mx-auto my-5">
        <div class="row my-5">
            <h1 class="text-center text-success fw-bolder">
                <img src="{{ asset('images/celebrate.png') }}" width="55" alt="">
                Welcome To Vienna Dream
                <img src="{{ asset('images/dream.png') }}" alt="">
            </h1>
        </div>
        <div class="row">
            <x-toaster />

            <div class="registration-card col-lg-6 col-md-10 mx-auto">
                <div class="registration-card-header">
                    <h2>Register Now To Vienna Dream Platform</h2>
                </div>
                <div class="registration-card-body mx-3">
                    <form action="{{ route('client.register') }}" method="POST">
                        @csrf
                        <div class="my-3">
                            <label for="name" class="registration-card-label">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="name" 
                                placeholder="Enter your name"
                                class="registration-card-input @error('name') border-danger @enderror"
                                value="{{ old('name', '') }}"
                                >

                            <div>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror 
                            </div>
                        </div>    

                        <div class="my-3">
                            <label for="email" class="registration-card-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                placeholder="Enter your email"
                                class="registration-card-input @error('name') border-danger @enderror"
                                value="{{ old('email', '') }}"
                                >
                                
                            <div>
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror 
                            </div>
                        </div>
                        
                        <div class="mx-auto text-center">
                            <button class="btn btn-outline-primary rounded-5 fw-bolder" type="submit">
                                Register
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection