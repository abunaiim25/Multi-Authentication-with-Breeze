@extends('layouts.auth_layout')

@section('title')
    REGISTER
@endsection

@php
@endphp


@section('auth_content')
    <div class="content">

        <h2>Sign Up</h2>

        <div class="form">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="inputBox">
                    <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name">
                    <i>Name</i>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: red" />
                </div>

                <!-- Email Address -->
                <div class="inputBox" style="margin-top: 10px">
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username">
                    <i>Email</i>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: red" />
                </div>

                <!-- Password -->
                <div class="inputBox" style="margin-top: 10px">
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <i>Password</i>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: red" />
                </div>

                <!-- Confirm Password -->
                <div class="inputBox" style="margin-top: 10px">
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password">
                    <i>Password</i>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: red" />
                </div>


                <div class="links" style="margin-top: 30px; display:grid">
                    <a href="{{ route('login') }}" style="grid-column-end: 4;">Already registered?</a>
                </div>

                <div class="inputBox" style="margin-top: 10px">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>

    </div>
@endsection


{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
