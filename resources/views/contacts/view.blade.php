<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container my-5" style="width:50%; margin:0 auto;">
        <div class="card">
            <div class="card-body p-5">
                <div class="card-title mb-5">
                    <h1 class="text-center mb-2"  style="font-size:2em;">About</h1>
                    <hr>
                </div>

                <div class="card-text px-5" style="font-size:1.4em;">
                    <img src="/storage/profile_images/{{ $contact->image }}" alt="img" style="height: 250px; width:300px; border-radius:50%; margin-left:17%; margin-bottom:20px;">
                    <p><strong>Name :</strong> {{$contact->name}}</p>
                    <hr>
                    <p class="mt-2"><strong>Email :</strong> {{$contact->email}}</p>
                    <hr>
                    <p class="mt-2"><strong>Address :</strong> {{$contact->address}}</p>
                    <hr>
                    <p class="mt-2"><strong>Phone :</strong> {{$contact->phone}}</p>
                    <hr>
                    <p class="mt-2"><strong>Relation:</strong> {{$contact->relation}}</p>
                    <hr>
                    <p class="mt-2"><strong>Note :</strong> {{$contact->note}}</p>
                </div>

                <div class="container my-5 text-center">
                    <a href="/dashboard" class="btn btn-secondary"><- Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

