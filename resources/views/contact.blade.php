@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<h1>Add Item</h1>
<form name="phone" id="phone" method="post" action="{{route('contact.create')}}">
       @csrf
        <div class="form-group">
          <label for="phone">phone_number</label>
          <input type="text" id="phone" name="phone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h3>Search</h3>
<form name="phone" id="phone" method="post" action="{{route('contact.show')}}">
       @csrf
        <div class="form-group">
          <label for="phone">phone_number</label>
          <input type="text" id="phone" name="phone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h3>Filter / Advanced Search</h3>

<form name="phone" id="phone" method="post" action="{{route('contact.filter')}}">
       @csrf
        <div class="form-group">
          <label for="phone">phone_number</label>
          <input type="text" id="phone" name="phone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<h3>Advanced Delete</h3>

<form name="phone" id="phone" method="get" action="{{route('contact.Advdelete')}}">
       @csrf
        <div class="form-group">
          <label for="phone">phone_number</label>
          <input type="text" id="phone" name="phone" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
</form>


<h1>List</h1>
@foreach ($phones as $phone)
    <p value="{{$phone->id}}">Phone ID: {{$phone->id}}  Phone Number : {{ $phone->phone_number}} </p>
    <button value="{{$phone->id}}" onclick="myFunction({{$phone->id}})">Index Value</button>
 


   
    <form name="phone" id="phone" method="post" action="{{route('contact.GOEdit')}}" style="display:inline;" >
       @csrf
        <div class="form-group" style="display:inline;">
          <input type="text" id="phone" name="phone" class="form-control" value="{{$phone->id}}" style="visibility:hidden; display:inline;" size="1" readonly>
        </div>
        <button type="submit" class="btn btn-primary" style="display:inline;">Edit</button>
  </form>
   
  <form name="phone" id="phone" method="post" action="{{route('contact.GOEdit')}}" style="display:inline;" >
       @csrf
        <div class="form-group" style="display:inline;">
          <input type="text" id="phone" name="phone" class="form-control" value="{{$phone->id}}" style="visibility:hidden; display:inline;" size="1" readonly>
        </div>
        <button type="submit" class="btn btn-primary" style="display:inline;">View Details</button>
  </form>

    <button type="submit" class="btn btn-primary" style="display:inline; "> <a href = 'delete/{{ $phone->id }}' style="text-decoration:none; color:black;">Delete</a></button>

@endforeach

<script>
function myFunction($id) {
  alert("Index value is: "+ $id);
}

</script>