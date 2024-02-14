@include('components.sidebar')
@include('components.formAdd')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('sources/Icon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/repository.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>StudySphere</title>
</head>
<body>
    
    @yield('sidebar')

    <section class="home">
        
        <div class="subjectHeader">
            <h1>Resource Repository</h1>
            <div class="user">
                <span>Hi, <b>{{ Auth::user()->firstname }}</b></span>
            </div>            
        </div>

        <div class="subjectContent">

            <div class="addSubjects">
                <i class='bx bx-plus' onclick="popupSF()"></i>
            </div>

            <div class="userSubjects">

                @foreach($subjects as $subject)
                <div class="subject">
                    <h2>{{ $subject->subject }}</h2>
                    <p>{{ $subject->description }}</p>

                    <div class="items">
                        <p>20 Items</p>

                        <div class="view">
                            <span><a href="{{ route('subjectview', ['id'=> $subject->id]) }}">View</a></span>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

        </div>

        @yield('addsubject')

    </section>

    <script src="{{ asset('js/formAdd.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>