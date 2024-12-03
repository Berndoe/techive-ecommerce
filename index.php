<?php

require_once('./settings/core.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Rental Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <!-- Header Section -->
    <header class="text-white p-4" style="background-color: #0298cf;">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold">TecHive</a>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="./index.php">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="./view/browse_products.php">Products</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="./view/login.php">Login</a></li>
                    <li><a href="./view/cart.php">Cart</a></li>
                    <li>
                        <form method="get" action="./view/search_results.php">
                            <input class="form-control" type="text" name="term" placeholder='Search'>
                        </form>
                    <li>

                </ul>

            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="text-center py-10 bg-gray-100">
        <h1 class="text-4xl font-bold mb-4">Rent the Latest Tech Gadgets Easily</h1>
        <p class="mb-8">Explore, rent, and enjoy top-quality tech products with flexibility and ease.</p>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-choose-us" class="py-12 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Why Choose TecHive?</h2>
            <div class="flex flex-wrap justify-center items-center text-left">
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="mb-6 px-4 py-6 bg-white shadow-lg rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Latest Technology</h3>
                        <p>Access the newest and most advanced tech gadgets on the market without the upfront investment. Always stay ahead with the latest technology trends.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="mb-6 px-4 py-6 bg-white shadow-lg rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Flexible Rental Terms</h3>
                        <p>Enjoy customizable rental periods, from a few days to several months, tailored to meet your needs. Whether for short-term projects or long-term exploration, we've got you covered.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="mb-6 px-4 py-6 bg-white shadow-lg rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Competitive Pricing</h3>
                        <p>Get the best value for your money. Our competitive pricing ensures you can enjoy premium technology at a fraction of the cost of purchasing.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/2 lg:w-1/3 p-4">
                    <div class="mb-6 px-4 py-6 bg-white shadow-lg rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Excellent Customer Support</h3>
                        <p>Experience hassle-free rental with our dedicated customer support team. We're here to help every step of the way, ensuring a smooth and satisfying rental experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Popular Products Section -->
    <section class="py-10 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Products</h2>
            <div class="flex flex-wrap justify-around items-start">
                <div class="card" style="width: 18rem;">
                    <img src="./images/laptops.jpg" class="card-img-top" alt="Laptops">
                    <div class="card-body">
                        <p class="card-text">Laptops.</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="./images/phones.jpg" class="card-img-top" alt="Phones">
                    <div class="card-body">
                        <p class="card-text">Phones</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img src="./images/cameras.avif" class="card-img-top" alt="Cameras">
                    <div class="card-body">
                        <p class="card-text">Cameras</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Us Section -->
    <section id="contact" class="py-10 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold">Get in Touch</h2>
                <p class="text-lg mt-2">Have questions? We're here to help.</p>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/2 lg:w-1/3">
                    <form action="./actions/contact_proc.php" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Name
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Your Name" name="name" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                                Email
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Your Email" name="email" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="message">
                                Message
                            </label>
                            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="message" placeholder="Your message..." name="message" required></textarea>
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <!-- Footer Section -->
    <footer class="text-white p-4 text-center" style="background-color: #0298cf;">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-around">
                <div>
                    <h3 class="font-bold">Quick Links</h3>
                    <a href="./index.php">Home</a><br>
                    <a href="./view/browse_products.php">Products</a><br>
                    <a href="./view/login.php">Login</a>

                </div>
                <div>
                    <h3 class="font-bold">Follow Us</h3>
                    <!-- Social Links -->
                    <div class="flex mt-2">
                        <a href="https://facebook.com" target="_blank" class="mr-4">
                            <i class="fab fa-facebook-f text-white text-xl"></i>
                        </a>
                        <a href="https://instagram.com" target="_blank" class="mr-4">
                            <i class="fab fa-instagram text-white text-xl"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank">
                            <i class="fab fa-twitter text-white text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <p class="mt-4">&copy; 2024 TecHive. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>