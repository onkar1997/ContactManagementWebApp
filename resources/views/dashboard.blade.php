<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="text-decoration:none;">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container my-5">
        <a href="{{route('contact.create')}}" class="btn btn-primary">Add Contact</a>
    </div>

    <div class="container my-5">
        @include('layouts.messages')
    </div>

    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr>
                            <td>
                                <img src="/storage/profile_images/{{ $contact->image }}" alt="img" style="height: 50px; width:50px; border-radius:5px;">
                            </td>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->phone}}</td>
                            <td style="display:flex; justify-content:center;">
                                <a href="{{route('contact.view', $contact->id)}}" class="btn btn-success mr-2">View</a>

                                <a href="{{route('contact.edit', $contact->id)}}" class="mr-2 btn btn-warning text-light">Edit</a>

                                <form action="{{route('contact.delete', $contact->id)}}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="show_confirm" data-toggle="tooltip" style="background-color:#ee0000;padding:10px; border-radius:5px; color:#fff;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

