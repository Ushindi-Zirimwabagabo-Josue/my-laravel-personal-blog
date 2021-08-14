@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4">Edit Link</h1>
                    <p>Edit and submit this form to update a link</p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title">Link Title</label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Link Title" value="{{ $link->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Link Url</label>
                                <input type="text" id="url" class="form-control" name="url" placeholder="Enter Link Url" value="{{ $link->url }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">Link Description</label>
                                <textarea id="description" class="form-control" name="description" placeholder="Enter Link Description"
                                          rows="5" required>{{ $link->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
