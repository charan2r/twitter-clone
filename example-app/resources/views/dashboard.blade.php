<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard</h1>
    
</body>
</html>-->

@foreach($users as $user)
   <h1>{{$user['name']}}</h1>
   <h1>{{$user['age']}}</h1>
@endforeach
