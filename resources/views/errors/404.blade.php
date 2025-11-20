<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .error-container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 48px;
            color: #dc3545;
        }
        p {
            font-size: 20px;
            color: #6c757d;
        }
        
        a {

            border-radius:4px;
            border:1px solid #007bff;
            padding:10px;
            background:#e7f1ff;
            
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        a:hover {
            text-decoration: none;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <p>Error 404</p>
        <h1>Pagina no cargada</h1>
        <span><a class="btn btn-default" href="/home">Volver a la página de inicio</a></span>
    </div>
</body>
</html>
