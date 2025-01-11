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
        @apply max-w-4xl px-10 py-8 mx-auto bg-white shadow-lg rounded-lg;
      }
      .form-input {
        @apply w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-300;
      }
      .form-label {
        @apply block text-sm font-medium text-gray-700 mb-2;
      }
      .form-button {
        @apply bg-blue-600 text-white py-2 px-6 rounded hover:bg-blue-500 transition duration-200;
      }
    }
    </style>
</head>
<body class="bg-blue-100 flex items-center justify-center min-h-screen">
    <div class="container">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-800">Update Patient Information</h2>
            <a href="/" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition duration-200">Back to Home</a>
        </div>

        <!-- Form Section -->
        <form action="{{ route('update',$ourPost->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <!-- Name Field -->
            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" value="{{ $ourPost->name }}" class="form-input" placeholder="Enter patient's name">
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Age Field -->
            <div>
                <label for="age" class="form-label">Age</label>
                <input type="text" id="age" name="age" value="{{  $ourPost->age }}" class="form-input" placeholder="Enter patient's age">
                @error('age')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address Field -->
            <div>
                <label for="address" class="form-label">Address</label>
                <input type="text" id="address" name="address" value="{{  $ourPost->address }}" class="form-input" placeholder="Enter patient's address">
                @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Disease Field -->
            <div>
                <label for="disease" class="form-label">Disease</label>
                <input type="text" id="disease" name="disease" value="{{  $ourPost->disease }}" class="form-input" placeholder="Enter patient's disease">
                @error('disease')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" id="image" name="image" class="form-input">
                @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <input type="submit" value="Update" class="form-button">
            </div>
        </form>
    </div>
</body>
</html>
