@extends ('layouts.studentLayout')
@section('content')
    <head>

        <title>CultureUp - Globe</title>

        <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css"/>
        <link rel="stylesheet" href="/css/Assignment/globe.css"/>

        <script src="https://js.arcgis.com/4.15/"></script>

    </head>

    <body class="assignment-background">
    <div class="container-fluid">

    <div class="row">
        <div class="card rounded softshadow" style="margin-top: 100px; margin-left: 150px; width: 1200px">
            <div class="card-header d-block justify-content-center ribbon p-0">
                <div class="row">
                    <div class="col">
                        <p class="ribbonText text-center p-3 m-0"> descriptions</p>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table text-center table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Country</th>
                        <th scope="col">Description</th>
                    </tr>
                    @foreach($countries as $country)
                    <tr>
                        <td scope="col">{{$country->country}}</td>
                        <td scope="col"></td>
                    </tr>
                        @endforeach
                    </thead>
                    <tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    </body>

    </html>
@endsection