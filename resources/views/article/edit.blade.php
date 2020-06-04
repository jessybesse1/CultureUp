@extends ('layouts.layout')
@section ('content')

    <head>
        <link href="/css/main/main.css">
    </head>


    <div class="mt-5 pt-5 container d-flex justify-content-center">
        <div class="card rounded p-0">
            <div class="card-header ribbon p-0">
                <p class="ribbonText text-center p-3 m-0">Edit your Article</p>
            </div>
            <div class="card-body">
                <form method="POST" action="/article/{{ $article->id }}">
                    @csrf
                    @method('PUT')


                    <div class="field form-group">
                        <label class="label" for="title">Title</label>
                        <input class="form-control" type="text" name="title" id="title"
                               value="{{$article-> title}}"
                               required>
                        @error('title')
                        <p>{{$errors->first('title')}}</p>
                        @enderror
                    </div>


                    <div class="field form-group">
                        <label class="label" for="excerpt">excerpt</label>
                        <input class="form-control" type="text" name="excerpt" id="excerpt"
                               value="{{$article -> excerpt}}"
                               required>
                        @error('excerpt')
                        <p>{{$errors->first('excerpt')}}</p>
                        @enderror
                    </div>


                    <div class="field form-group">
                        <label class="label" for="text">text</label>
                        <textarea id="textArea" name="text" rows="4" cols="50"
                                  required>{{ $article -> text}}</textarea>
                        @error('text')
                        <p>{{$errors->first('text')}}</p>
                        @enderror
                    </div>


                    <div class="row text-center pt-4">
                        <div class="col">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                        <div class="col">
                            <button class="btn btn-light">Cancel</button>
                        </div>

                    </div>
                </form>

                <form method="POST" action="/article/{{$article->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="col">
                        <div class="control">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
