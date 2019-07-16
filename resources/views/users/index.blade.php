<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Phonenumber</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($users as $user)
        <tr>
            <td>
            <a href="{{ route('user-edit', ['id' => $user->id]) }}" title="Edit user details">
                {{ $user -> getFullName()}}
            </a>
            </td>

            <td>
                {{ (!empty($user -> contactnumber)) ? $user -> contactnumber : 'No contact number provided.'}}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2">
                There are no users yet.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
