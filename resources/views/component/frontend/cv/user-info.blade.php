<div class="cv-ele-body">
    <table class="table table-responsive">
        <tr>
            <th>About</th>
            <td><p>{{ $user->summary }}</p></td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th>Website</th>
            <td><a href="{{ $user->Website }}" target="_blank">{{ $user->website }}</a></td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ $user->location->address }}, {{ $user->location->postal_code }}, {{ $user->location->city }}, {{ $user->location->region?$user->location->region.' region,':'' }} {{ $user->location->country_code }}</td>
        </tr>
        <tr>
            <th>Profession</th>
            <td>{{ $user->label }}</td>
        </tr>

    </table>
</div>