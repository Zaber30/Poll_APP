<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/from.js'])
    
</head>
<body>
    <h2>Submit Your Info</h2>
    <form action="{{route('form.submit')}}" method="POST">
        @csrf
        <label>Name:</label>
        <input id="name" type="text" name="name" required><br>
        <div id="nameerror" style="color:red; margin-top:10px"></div>

        <label>Email: </label>
        <input type="email" name="email" required><br><br>
         <button type="submit">Submit</button>
    </form>  
    <div class="nth-3:underline">nice the limit</div>
    <div class="nth-last-5:underline">without</div>
</body>
    
</html>