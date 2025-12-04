<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fcfcfb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container{
            display:flex;
            width: 50%;
            flex-direction: column;
            justify-content:center;
            align-items:center;
            
        }
        p{
            padding: 0;
            margin: 0;
        }
        a {
            text-decoration: none;
            font-weight: bold;
            text-decoration: none;
            margin-top:20px;
            padding:6px 10px;
            background: rgba(91, 189, 228, 0.8);
            color: white;
            border-radius:4px;
            border:1px solid rgba(91, 189, 228, 0.8);
            text-align:center;
        }a:hover {
            text-decoration: none;
        }
        .error{
            font-size: 3em;
            color: rgba(195, 38, 8, 0.8);
            margin: 0 8px;
        }
        .msg{
            margin:16px;
            color: rgba(122, 110, 107, 0.8);
            font-size: 1.5em;
        }
        .btn{
            
        }
        .image{
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="image" src="{{asset('backend/dist/img/419.jpg')}}" alt="Error 419"/>
        <p class="msg">Esta pagina ha expirado</p>
        <span class="btn"><a class="btn" href="/home">Volver a la página de inicio</a></span>
    </div>
</body>
</html>
