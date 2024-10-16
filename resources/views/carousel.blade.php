<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/style3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>
<body>
    <div class="row">

        <div class="col">
          <div class="col-rt-12">
            <!-- Slider -->
                    <div id="slider">
                      <div class="slides">
                        <div class="slider">
                          <div class="legend"></div>
                          <div class="content">
                            <div class="content-txt">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</p>
                            </div>
                          </div>
                          <div class="image"> <img src="{{ asset('img/carosel1.jpeg') }}"> </div>
                        </div>
                        <div class="slider">
                          <div class="legend"></div>
                          <div class="content">
                            <div class="content-txt">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</p>
                            </div>
                          </div>
                          <div class="image"> <img src="{{ asset('img/learnner.jpeg') }}"> </div>
                        </div>
                        <div class="slider">
                          <div class="legend"></div>
                          <div class="content">
                            <div class="content-txt">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</p>
                            </div>
                          </div>
                          <div class="image"> <img src="{{ asset('img/learn.jpeg') }}"> </div>
                        </div>
                        <div class="slider">
                          <div class="legend"></div>
                          <div class="content">
                            <div class="content-txt">
                              <h2>Lorem ipsum dolor</h2>
                              <p>Nam ultrices pellentesque facilisis. In semper tellus mollis nisl pulvinar vitae vulputate lorem consequat. Fusce odio tortor, pretium sit amet auctor ut, ultrices vel nibh.</p>
                            </div>
                          </div>
                          {{-- <div class="image"> <img src="img/4.jpg"> </div> --}}
                        </div>
                      </div>
                      <div class="switch">
                        <ul>
                          <li>
                            <div class="on"></div>
                          </li>
                          <li></li>
                          <li></li>
                          <li></li>
                        </ul>
                      </div>
                    </div>
                   </div>
        </div>
      </div>
</body>
</html>
