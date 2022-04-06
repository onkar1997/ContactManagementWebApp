<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <a href="/dashboard" class="btn btn-secondary">Back</a>
    </div>

    <div class="container my-5">
        <form action="{{route('contact.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card p-4" style="width: 50rem; border-radius:5%; margin:10px auto;">
            
                <div class="card-body">
                    <div class="card-title mb-5">
                        <h1 class="text-center mb-2"  style="font-size:2em;">Add Information</h1>
                        <hr>
                    </div>

                    <div class="container my-5">
                        @include('layouts.messages')
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">+91</span>
                            <input type="text" class="form-control" name="phone" id="phone" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="relation" class="form-label">Relation</label>
                        <input type="text" class="form-control" id="relation" name="relation">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea class="form-control" id="note" name="note" rows="2"></textarea>
                    </div>
                    <div class="mb-5">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-outline-primary">Add</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

