<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CultureUp - Editor</title>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/BookEngine/editor.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/5b65a26ca8.js" crossorigin="anonymous"></script>

    <!-- Bootstrap select -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar" style="z-index: 100">
        <div class="sidebar-header">
            <h3>CultureUP Editor</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="softshadow stick">
                <a><i class="bar-icon fas fa-quote-right"></i><span class="bar-text"> Add Text</span></a>
            </li>
            <li class="softshadow stick">
                <a><i class="bar-icon fas fa-image"></i><span class="bar-text"> Add Image</span></a>
            </li>
            <li class="softshadow stick">
                <a><i class="bar-icon fas fa-link"></i><span class="bar-text"> Add Link</span></a>
            </li>
            <li class="softshadow stick">
                <a onclick="addPageToggle();"><i class="bar-icon fas fa-cog"></i> <span class="bar-text"> Page settings</span></a>
            </li>
            {{--            <li>--}}
            {{--                <label for="testButton">NewPage</label>--}}
            {{--                <input name="testButton" type="button" id="testButton">--}}
            {{--            </li>--}}
            {{--            <li id="testAppend">--}}
            {{--            </li>--}}
        </ul>
    </nav>

    <div id="content">
        <button type="button" id="sidebarCollapse" class="blue-icon btn">
            <i class="m-0 fas fa-pencil-ruler"></i>
        </button>
    </div>

    <!-- Bottombar -->
    <nav id="bottombar" style="z-index: 100">
        <div class="text-center pt-2 sidebar-header">
            <h3 class="d-inline" style="color: #212529;">Timeline</h3><i class="d-inline ml-2 fas fa-ellipsis-h bar-icon" style="color: #323232; margin: 0px"></i>
        </div>
        <div class="row w-100 text-center ml-2 pl-5" style="height: 200px; margin-top: -3px">
            <div class="col-auto p-3 my-auto">
                <div class="card text-white custom-rounded h-auto" style="width: 15vw;">
                    <img class="card-img custom-rounded" src="http://placehold.it/160x90">
                </div>
            </div>
            <div class="col-auto p-3 my-auto">
                <div class="card text-white custom-rounded h-auto" style="width: 15vw;">
                    <img class="card-img custom-rounded" src="http://placehold.it/160x90">
                </div>
            </div>
            <div class="col-auto p-3 my-auto">
                <div class="card text-white custom-rounded softshadow h-auto" style="width: 15vw;">
                    <img class="card-img custom-rounded" src="http://placehold.it/160x90">
                </div>
            </div>
            <div class="col-auto my-auto">
                <button type="button" id="addPage" class="btn blue-icon">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>

        <button type="button" id="bottombarCollapse" class="btn blue-icon" style="padding: 12px 6px;">
            <i class="fas fa-film"></i>
        </button>
    </nav>

    <div id="formToggle" class="position-absolute assignment-info"
         style="top: 40%; left: 50%; transform: translate(-50%, -50%); width: 20vw; z-index: 200;">
        <div class="card rounded p-0 w-100">
            <div class="card-header ribbon p-0">
                <p class="ribbonText text-center p-3 m-0">Edit assignment info</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label class="label" for="title">Title</label>
                    <input class="form-control" type="text" id="assignmentName" placeholder="Enter title"
                           required
                           value="{{old("name")}}">
                    @error('title')
                    <p>{{$errors->first('name')}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="label" for="subject">Description</label>
                    <input class="form-control" type="text" id="assignmentSubject" placeholder="Enter subject"
                           required
                           value="{{old("subject")}}">
                    @error('subject')
                    <p>{{$errors->first('subject')}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="label" for="inputState">Country</label>
                    <select id="inputState" class="form-control selectpicker" data-live-search="true"
                            data-size="10">
                        <option>Afghanistan</option>
                        <option>African central republic</option>
                        <option>Albania</option>
                        <option>Algeria</option>
                        <option>Andorra</option>
                        <option>Antigua and barbud</option>
                        <option>Argentina</option>
                        <option>Armenia</option>
                        <option>Australia</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                        <option>...</option>
                    </select>
                </div>

                <div class="row text-center pt-4">
                    <div class="col">
                        <button class="btn btn-light" type="submit" id="updateAssignmentButton">Submit</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-danger" onclick="untoggleOtherForm()">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@include ('BookEngine.page', compact('page'))

<div id="ElementList">
<div>{{$page->title}}</div>
</div>
<meta>
<script>

    const pageInfo = {
        name: '{{$page->name}}',
        description: '{{$page->description}}',
        id: '{{$page->id}}'
    };

    try {
        //doenst exist anymore
        document.getElementById('testButton').addEventListener('click', function () {
            createInputField('page', pageInfo)
        });
    } catch {
    }

    const currentAssignment = 1;

    @include("BookEngine.Editor.js.assignmentEdit")

{{--    @include("BookEngine.Editor.js.newPage")--}}


</script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
{{--Bootstrap select--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<script src="/editor.js"></script>


</body>

</html>





