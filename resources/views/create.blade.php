@extends('layout.main')
@section('title')
    <div class="container">
        <h1 class="jumbotron-heading text-center m-3">Add New Order</h1>
    </div>
@endsection
@section('content')
    <div class="album text-muted">
        <div class="container">
            <form name="create-new-order-form" id="create-new-order-form" method="post" action="{{ url('store') }}">
                @csrf  
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif  
                <div class="row">
                    <div class="col mb-3">
                        <label for="contact">Address 1</label>
                        <input type="text" class="form-control" name="address1" placeholder="">
                        @if ($errors->has('address1'))
                            <span class="text-danger">{{ $errors->first('address1') }}</span>
                        @endif
                    </div>
                    <div class="col mb-3">
                        <label for="contact">Address 2</label>
                        <input type="text" class="form-control" name="address2" placeholder="">
                        @if ($errors->has('address2'))
                            <span class="text-danger">{{ $errors->first('address2') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="contact">Address 3</label>
                        <input type="text" class="form-control" name="address3" placeholder="">
                    </div>
                    <div class="col-4 mb-3">
                        <label for="contact">Town</label>
                        <input type="text" class="form-control" name="town" placeholder="">
                        @if ($errors->has('town'))
                            <span class="text-danger">{{ $errors->first('town') }}</span>
                        @endif
                    </div>
                    <div class="col mb-3">
                        <label for="contact">Postal Code</label>
                        <input type="text" class="form-control" name="postcode" placeholder="6530">
                        @if ($errors->has('postcode'))
                            <span class="text-danger">{{ $errors->first('postcode') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="contact">Agent/Owner</label>
                        <select class="form-select" name="contact" aria-label="Default" id="contact">
                            <option value="">Please select a contact</option>
                            @foreach($contacts as $contact)
                                <option value="{{$contact->id}}">{{$contact->firstname . ' ' . $contact->lastname . ' - ' . $contact->type}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('contact'))
                            <span class="text-danger">{{ $errors->first('contact') }}</span>
                        @endif
                    </div>
                    <div class="col mb-3">
                        <label for="tagCheckbox" style="width:100%; margin-bottom:6px;">Tags</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="backGarden" name="tags[]" value="back-garden">
                            <label class="form-check-label" for="backGarden">back-garden</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="frontGarden" name="tags[]" value="front-garden">
                            <label class="form-check-label" for="frontGarden">front-garden</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="driveway" name="tags[]" value="driveway">
                            <label class="form-check-label" for="driveway">driveway</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="garage" name="tags[]" value="garage">
                            <label class="form-check-label" for="garage">garage</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
        </div>
   </div>
@endsection
<b></b>