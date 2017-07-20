@extends('layouts.master')
@section('title')
    My Account
@endsection
@section('content')
<section class="row new-post">
    <div class="col-md-6 col-md-offset">
        <header>
            <h3>My Account</h3>
        </header>
        <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}" id="first_name">
            </div>
            <div class="form-group">
                <label for="image">Image (only .jpg)</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>
            <button type="submit" class="btn btn-primary">Save Account</button> 
            {{csrf_field()}}
        </form>
    </div>
</section>
 @if(Storage::disk('local')->has($user->first_name. '-' . $user->id . '.jpg'))
<section>
    <div class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <img src="{{ route('account_image', ['filename' => $user->name. '-' . $user->id . '.jpg']) }}">
        </div>
    </div>
</section>
@endif
@endsection