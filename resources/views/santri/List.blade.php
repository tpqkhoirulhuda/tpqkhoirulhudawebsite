<x-head/>

<x-guest-layout>
    <div class="container text-white">
        <h1>List of Users</h1>

        <table class="table text-white">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody >
                @foreach ($santri as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-guest-layout>
