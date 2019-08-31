<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .menu {
                margin-left:60%;
                text-transform:capitalize; 
                font-size: 15px;    
                font-family: Georgia, 'Times New Roman', Times, serif;
             
            }
            .menu-item{ 
                padding: 0 10px 0 10px;
            }
            .item{
                color:#3094db;
            }
            .icon{
                padding: 0 8px 0 1px;
                font-size:18px;
            }
            .logo{
                width:50px;
                height: 40px;
            }
          .header{
            width: 100%;
            padding: 40px 0;
            background-color: #32a7db;
            color:white;
          }
          .para{
            font-size: 16px;
            font-weight: 200;
            color:rgba(255,255,255,0.7);
          }
          .title{
            font-size: 60px;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            text-shadow: 0 1px 1px #666;
            line-height: 1.1;
            letter-spacing: -3px;
          }
          .header2{
              background: #2196f3;
			  padding-left: 25%;
			  color: white;
			  text-transform:uppercase;
          }
          .h2item{
            padding: 15px 20px;
            color:white;
            font-size: 12px;
            text-transform: uppercase;
          }
		  .srch{
			font-size:20px;	
			  background:#017ab0;
			 padding: 10px 25px 10px 20px;
		  }
		  .icon2{
			padding-right:20px;
		  }
		  .main{
              overflow: hidden;
              position:static; 
          }
          .component{
              padding-top:5%;
              width:45%;
              margin: 0 auto;
          }
          .post{
        list-style:none;
        margin: 10px 0 20px 0;
    }
    .category{
        background: #F3A9C9 ;
    }
    .header1{
        margin: 0 0 0 0;
        padding: 0 0 0 0;
    }
        </style>
    </head>
    <body>
        <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light header1">
            <a class="navbar-brand brand " href="{{ url('/home') }}">
                <img height="35" width="100" src="http://gooyaabitemplates.com/download/Free-Blogger-Templates.png" alt="Live Preview">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  menu">
                    <li class="nav-item menu-item">
                        <a href="" class="item"><i class="fa fa-paint-brush icon"></i>by styles</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a href="" class="item"><i class="fa fa-briefcase icon"></i>by featuers</a>
                    </li>
                    <li class="nav-item menu-item">
                        <a href="" class="item"><i class="fa fa-paperclip icon"></i>by topics</a>
                    </li>
                    <li class="nav-item menu-item">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a href="{{ url('/home') }}">Home</a>
                                @else
                                <li class="nav-item menu-item">
                                    <a href="{{ route('login') }}" class="item">
                                        <i class="fa fa-sign-in icon"></i>Login
                                    </a>
                                </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item menu-item">
                                        <a href="{{ route('register') }}" class="item">
                                            <i class="fa fa-user-plus icon"></i>Register
                                        </a>
                                    </li>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
        <div class="header">
            <div class="">
            <h1 class="text-center title">Earth Pro</h1>      
            <h2 class="text-center para">Earth Pro Blogger Template - PremiumBloggerTemplates.com</h2>
            </div>    
        </div>
        <nav class="navbar navbar-expand-lg header2">
            
            <button class="navbar-toggler light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="h2item">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item">business</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item">downloads</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item">parent category</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item">featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item">health</a>
                    </li>
                    <li class="nav-item">
                        <a class="h2item mr-5">uncategorized</a>
                    </li>
                    <li class="nav-item ">
                        <a class="h2item srch "><i class="fa fa-search icon2"></i></a>
                    </li>
                </ul>
            </div>
            </nav>
        </div>

        <div class="container-fluid row">  
                <div class="col-sm-8 ">
                        @foreach ($posts as $post)
                        <li class="post">
                            <div class="card">
                                <div class="card-header">
                                    <h4>
                                        <strong>{{$post->title}}</strong>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <p>{{$post->description}}</p>
                                </div>
                                <div class="card-footer">
                                    <h5>
                                        {{$post->category->name}}
                                    </h5>
                                    <small>
                                        created_at:<i>{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y')  }}</i>
                                    </small>
                                    <button class="btn btn-primary btn-xs pull-right">Read More</button>
                                </div>
                            </div>
                        </li>  
                        @endforeach
                </div>
                <div class=" col-sm-4 mt-2">
                        <div class=" category ">
                            <div class="card-header">
                                <h4><strong>Categories</strong></h4>
                            </div>
                            <div class="card-body">
                                @foreach ($categories as $category)
                                    <li class="post">
                                       <a href="{{ action('PostController@filterPosts',$category->id )}}">
                                            {{$category->name}}
                                       </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
  </body>
</html>
