<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ dashboardName() }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">



        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                /*background-image:url('');background-repeat: no-repeat;*/
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                /*height: 100vh;*/
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height " style="padding-top: 130px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 text-center">
                  
                     <h1 style="font-family: arial; color:red;">{{ dashboardName() }}</h1>
                     <h4 style="font-family: arial; color:blue;"><b> </b></h4>
                        
                    </div>
                    <div class="col-xs-6 text-center hidden-lg">
                        <img src="{{ asset('image/student.png') }}" class="img-responsive" style="padding-left:10px;">
                         <a href="{{ route('student.login') }}"><button type="button" class="btn btn-success"><b>Agent</b></button></a>
                    </div>
                    <div class="col-xs-6 text-center hidden-lg">
                        <img src="{{ asset('image/admin.png') }}" class="img-responsive" style="padding-left:10px;">
                         <a href="{{ route('admin.login') }}"><button type="button" class="btn btn-info"><b>admin</b></button></a>
                    </div>
                     <div class="col-lg-2  col-md-offset-4 text-center hidden-xs">
                        <img src="{{ asset('image/student.png') }}" class="img-responsive" style="padding-left:10px;">
                         <a href="{{ route('student.login') }}"><button type="button" class="btn btn-success"><b>Agent</b></button></a>
                    </div>
                    <div class="col-lg-2 text-center hidden-xs">
                        <img src="{{ asset('image/admin.png') }}" class="img-responsive" style="padding-left:10px;">
                         <a href="{{ route('admin.login') }}"><button type="button" class="btn btn-info"><b>Admin</b></button></a>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="title m-b-md">
           

                   
                </div>

                 
            </div>
        </div>
    </body>
</html>
