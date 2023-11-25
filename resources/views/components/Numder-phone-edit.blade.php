
<form action="{{route('users.updatePhone',Auth::user())}}" method="post">
    @csrf
    @method('PUT')
    <label for="Phone">NUMBER phone</label>
    <input type="tel" name="phone" id="Phone">
    <button type="submit">submit</button>
</form>