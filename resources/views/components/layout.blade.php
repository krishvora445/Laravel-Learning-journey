@props([
    'title' => 'krish',
])


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .max-w-400 {
            max-width: 400px;
            margin: 20px auto;
        }

        .card {
            padding: 1rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background-color: #fff;
        }

          nav {
              background-color: #f5f5f5;
              padding: 12px 20px;
              border-radius: 12px;
              /* box-shadow: 0 2px 8px rgba(0,0,0,0.1); */
          }

          nav ul {
              list-style: none;
              margin: 0;
              padding: 0;
              display: flex;
              gap: 20px;
              justify-content: center;
          }

          nav ul li a {
              text-decoration: none;
              color: black;
              font-weight: 600;
              padding: 8px 16px;
              border-radius: 20px;
              transition: all 0.3s ease;
          }

         nav ul li a:hover {
             background-color: black;
             color: white;
             transform: translateY(-2px);
         }
    </style>
</head>
<body>
<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact Us</a></li>
    </ul>
</nav>


    <main>
            {{ $slot }}
    </main>
</body>
</html>
