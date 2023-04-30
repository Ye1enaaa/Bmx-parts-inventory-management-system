

@section('edit-user')

    <!--POP UP EDIT-->
    <div id="edit-user-form-{{ $user->id }}" class="popup-form">
        <form action="{{route('edit.user', $user->id)}}" method="post">
            @csrf
            @method('PATCH')
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $user->name }}" required><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <button type="submit">SAVE</button>
            <button type="button" onclick="hideEditForm({{ $user->id }})">CANCEL</button>
        </form>
    </div>


@endsection
