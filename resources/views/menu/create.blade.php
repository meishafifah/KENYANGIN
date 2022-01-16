@extends('templates/master')
@section('content')
<div class="container py-5">
    <form action=" {{ route('menu.store', $restaurant->slug) }} " method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input your menu name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"
                placeholder="Input your menu description"></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Input your menu price">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input type="file" class="form-control" name="picture" id="picture" placeholder="Input your menu picture">
        </div>
        <button class="btn btn-kenyang" type="submit">Submit</button>
    </form>
</div>
@endsection