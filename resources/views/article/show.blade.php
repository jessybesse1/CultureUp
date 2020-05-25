@extends ('layouts.studentLayout')
@section ('content')

<div class="container-fluid text-center">
    <div class="card w-100 m-5 text-center">
        <div class="card-header display-4 m-2">
            {{$article->title}}
        </div>
        <div class="card-body">
            {{$article->excerpt}} <br>
            {{$article->text}}
        </div>
    </div>

</div>


@endsection