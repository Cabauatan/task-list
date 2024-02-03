<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title class="mb-4">Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        .btn {
          @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
        }
        .link {
          @apply font-medium text-gray-700 underline decoration-pink-500
        }
        label {
      @apply block uppercase text-slate-700 mb-2
    }
    input, 
    textarea {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }
    .error {
      @apply text-red-500 text-sm
    }
      </style>
    @yield('style')
</head>
<h1 class="mb-4 text-2xl">@yield('title')</h1>
<body class="container mx-auto mt-10 mb-10 max-w-lg">
    @if (session()->has('success'))
        {{session('success')}}
    @endif
    @yield('content')
</body>
</html>