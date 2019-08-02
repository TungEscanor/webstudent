<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Hello: {{$user->student->name}}</h1>
    <p>Your avg marks is: {{$user->student->marks->avg('mark')}}</p>
</body>
</html>
