@extends('templates/master')
@section('content')
<div class="container py-5">
    <form action=" {{ route('store') }} " method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input your restaurant name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" placeholder="Input your restaurant description"></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input class="form-control" name="rating" id="rating" placeholder="Input your restaurant rating">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input class="form-control" name="picture" id="picture" placeholder="Input your restaurant picture">
        </div>
        <button class="btn btn-kenyang" type="submit">Submit</button>
    </form>
</div>
@endsection