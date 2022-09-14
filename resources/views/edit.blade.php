<h1>Edit Page</h1>

@foreach ($phones as $phone)
<p >Phone ID: {{$phone->id}}  Phone Number : {{ $phone->phone_number}} </p>


<form name="phone" id="phone" method="post" action="{{route('contact.GOEdit2')}}" style="display:inline;" >
       @csrf
        <div class="form-group" style="display:inline;">
        <label>Phone ID</label>
          <input type="text" id="phoneid" name="phoneid" class="form-control" value="{{$phone->id}}" readonly>
        <label>Phone Number</label>
          <input type="text" id="phonenumber" name="phonenumber" class="form-control" value="{{$phone->phone_number}}">
        </div>
        <button type="submit" class="btn btn-primary" style="display:inline;">Edit</button>
        <p style="color:red;"> ID is read only</p>
</form>

@endforeach
