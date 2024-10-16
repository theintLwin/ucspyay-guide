<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
   @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");


body{
 background-color:#545454;
 font-family: "Poppins", sans-serif;
 font-weight: 300;
}

.container{
 height: 100vh;
}

.card{

 width: 380px;
 border: none;
 border-radius: 15px;
 padding: 8px;
 background-color: #63AABF;
 position: relative;
 height: 600px;
}

.upper{

 height: 100px;

}

.upper img{

 width: 100%;
 border-top-left-radius: 10px;
 border-top-right-radius: 10px;

}

.user{
 position: relative;
}

.profile img{


 height: 80px;
 width: 80px;
 margin-top:2px;


}

.profile{

 position: absolute;
 top:-50px;
 left: 38%;
 height: 90px;
 width: 90px;
 border:3px solid #FFF;

 border-radius: 50%;

}

.follow{

 border-radius: 15px;
 padding-left: 20px;
 padding-right: 20px;
 height: 35px;
}

.stats span{

 font-size: 29px;
}
.long-arrow-left{
  display: block;
  margin: 50px 30px;
  width: 25px;
  height: 25px;
  border-top: 2px solid #000;
  border-left: 2px solid #000;
}
.long-arrow-left::after{
  content: "";
  display: block;
  width: 2px;
  height: 45px;
  background-color: black;
  transform: rotate(-45deg) translate(15px, 4px);
  left: 0;
  top: 0;
}
.long-arrow-left{
 transform: rotate(-45deg);
}
    </style>
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center">
      <a href="{{ url('/') }}"><div class="long-arrow-left"></div></a>
        <div class="card">

         <div class="upper">

           <img src="{{ asset('img/about.jpg') }}" class="img-fluid">

         </div>

         <div class="user text-center">

           <div class="profile">

             <img src="{{ asset('img/blog/blog-1.jpg') }}" class="rounded-circle" width="80">

           </div>

         </div>


         <div class="mt-5 text-center">
            <br><br><br>
           <h2 class="mb-0" style="text-align: center;">Benjamin Tims</h2>

           <span class="text-muted d-flex justify-content-center">Email:</span><p>benja123@gmail.com</p>
           <span class="text-muted mb-1">Mobile No:</span><p>0978543223</p>





           <div class="d-block justify-content-between align-items-center mt-4 px-4 bg-info">

            <span class="d-block mb-2 text-light">Dashboard</span>
            <h6 class="bg-light">Your Current Hiring:</h6><br>
            <h6 class="bg-light">Grade:</h6><br>
            <h6 class="bg-light">subject:</h6><br>


           </div>

         </div>


        </div>

      </div>

</body>
</html>
