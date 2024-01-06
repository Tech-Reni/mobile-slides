<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content here -->
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background-color: black;
        }
        #slider {
            width: 99%;
            height: 99vh;
            margin: auto;
            overflow: hidden;
            border: 1px solid;
        }

        #image-container {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        #image-container img {
            width: 100%;
            height: fit-content;
        }

        .slider-image {
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="slider">
        <div id="image-container">
            <img src="images/aston-martin.jpg" alt="">
        </div>
    </div>

    <script>
        const slider = document.getElementById('slider');
        const imageContainer = document.getElementById('image-container');
        const socket = new WebSocket('ws://localhost:8080');
        let images = ['images/aston-martin.jpg', 'images/Blue Benz.jpg', 'images/Audi-Rs-Ston-G.jpg'];
        let currentIndex = 0;

        socket.onmessage = function(event) {
            const command = event.data;
            
            // Process the received command (e.g., 'prev' or 'next')
            if (command === 'prev') {
                currentIndex = Math.max(currentIndex - 1, 0);
            } else if (command === 'next') {
                currentIndex = Math.min(currentIndex + 1, images.length - 1);
            }

            updateSlider();
        };

        function updateSlider() {
            imageContainer.innerHTML = '';
            
            images.forEach((imageUrl, index) => {
                const img = document.createElement('img');
                img.src = imageUrl;
                img.classList.add('slider-image');
                imageContainer.appendChild(img);

                // Adjust the transform property to slide to the current index
                const transformValue = 'translateX(' + (-100 * currentIndex) + '%)';
                imageContainer.style.transform = transformValue;
            });
        }
    </script>
</body>
</html>
