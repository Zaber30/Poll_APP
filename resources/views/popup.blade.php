<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/popup.js'])
    <style>
          .main{
             
             margin:10px;
             display:inline-block;
             box-shadow:1px 1px 3px black;
             
          }
          .sub{
            color:green;
          }
          .dis{
            display:none;
          }
    </style>
</head>
<body>
    <div id="main" class="main">
        <p class="sub">this is the pop chekcup</p>
        <button id="close">****</button>
    </div>
    {{-- <script src="{{asset('js/popup.js')}}"></script> --}}
</body>

</html>