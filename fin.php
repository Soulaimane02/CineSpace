<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easter Eggs</title>

    <!-- Anime.js pour les animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>

    <style>
        body {
            background-color: #1a1a1a;
            color: #fff;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            text-align: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            letter-spacing: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            box-shadow: 0 0 30px rgba(255, 255, 255, 0.8);
            cursor: pointer;
        }

        img:hover {
            animation: heartbeat 1s infinite;
        }

        @keyframes heartbeat {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Easter Eggs</h1>
        <img id="eggImage" src="photo_eggs.png" alt="Easter Eggs" onclick="animateEgg()">
    </div>

    <!-- Script pour ajouter des effets avec JavaScript -->
    <script>
        function animateEgg() {
            anime({
                targets: '#eggImage',
                rotate: '2turn',
                scale: 1.5,
                easing: 'easeInOutQuad',
                direction: 'alternate',
                duration: 1000
            });
        }
    </script>
</body>
</html>
