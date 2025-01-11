<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container {
        @apply px-10 mx-auto;
      }
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500">Home</h2>
            <a href="/create" class="bg-green-500 text-white rounded py-2 px-4">Add New Patients</a>
        </div>
    </div>
</body>
</html>
