<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        html {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>Admin Login</title>
</head>

<body>
    <div class="my-20 mx-2 flex flex-col justify-center items-center">
        <div class="bg-white w-full md:w-1/4 shadow rounded-md p-5 mx-2">
            <div class="text-center">
                <i class="fas fa-user-shield fa-4x mb-2 text-blue-600"></i>
                <h1 class="text-4xl font-bold mb-2 text-blue-600">Admin Login</h1>
                <!-- <p class="text-sm text-gray-500">Login to dashboard</p> -->
            </div>
            <hr class="mt-2 mb-2">
            @if (session('status'))
            <div class=" alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{ route('admin.login') }}" method="POST" class="mt-2">
                @csrf
                <input type="email" name="email" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" placeholder="Email" value="{{ old('email')}}" autofocus />
                @error('email')
                <p class="text-red-600 text-sm font-light">{{ $message }}</p>
                @enderror

                <input type="password" name="password" class="h-12 border w-full font-xs text-gray-500 app border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring focus:ring-indigo-300" id="pass" placeholder="Password" />
                @error('password')
                <p class="text-red-600  text-sm font-light">{{ $message }}</p>
                @enderror


                <!-- <div class="mt-6">
                <a href="/forgot-password" class="font-medium text-sm text-gray-500 float-right">Forgot Password?</a>
            </div> -->
                <button type="submit" class="mt-6 text-center w-full bg-blue-700 rounded-md text-white py-3 font-medium hover:bg-blue-600 transition"><i class="fas fa-sign-in-alt mr-1"></i>Login</button>
                <!-- <p class="text-sm text-center my-4 text-gray-500">Don't have an account ? <a href="/register" class="underline">Sign Up</a></p> -->
            </form>
        </div>
    </div>
    <div class="text-center">
        <p class="text-gray-500">Waktu Server : <span class="text-red-500 ">{{ date('g:i a - d M Y')}}</span></p>
    </div>
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
</body>

</html>
