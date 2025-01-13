<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
            .container {
                @apply px-10 mx-auto;
            }
        }
        /* Custom styles */
        .table-header {
            @apply bg-blue-700 text-white text-lg;
        }
        .table-row {
            @apply odd:bg-white even:bg-gray-50;
        }
        .table-cell {
            @apply px-8 py-6 text-gray-800 text-base;
        }
        .alert {
            @apply bg-blue-100 border border-blue-400 text-blue-700 px-6 py-4 rounded relative my-6 text-lg;
        }
        .alert strong {
            @apply font-bold;
        }
        .button {
            @apply bg-blue-700 text-white rounded-lg py-3 px-6 shadow-md hover:bg-blue-600 transition duration-200 text-lg;
        }
        /* Additional styles */
        body {
            @apply bg-gray-50 font-sans;
        }
        h2 {
            @apply text-4xl font-semibold text-gray-800 mb-4;
        }
        table {
            @apply min-w-full divide-y divide-gray-300 shadow-lg rounded-lg;
        }
        th {
            @apply text-left text-lg font-medium uppercase tracking-wide px-6 py-4;
        }
        td {
            @apply text-lg font-medium text-gray-800;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Existing Content -->
        <div class="flex justify-between items-center my-5">
            <h2>Patient Management</h2>
            <a href="/create" class="button">Add New Patient</a>
        </div>

        @if(session('success'))
            <div class="alert" role="alert">
                <strong>Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden rounded-lg shadow-lg">
                        <table class="divide-y divide-gray-300">
                            <thead>
                                <tr class="table-header">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Disease</th>
                                    <th scope="col">Image</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr class="table-row">
                                    <td class="table-cell">{{$post->id}}</td>
                                    <td class="table-cell">{{$post->name}}</td>
                                    <td class="table-cell">{{$post->age}}</td>
                                    <td class="table-cell">{{$post->address}}</td>
                                    <td class="table-cell">{{$post->disease}}</td>
                                    <td class="table-cell">
                                        <img src="images/{{$post->image}}" alt="{{$post->name}}'s image"
                                             class="h-16 w-16 object-cover rounded-md shadow-sm cursor-pointer"
                                             onclick="showModal('images/{{$post->image}}')">
                                    </td>
                                    <td class="table-cell text-right">
                                        <a href="{{ route('edit', $post->id) }}" class="edit-delete-links bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition duration-200 mr-2">Edit</a>
                                        <a href="{{ route('delete', $post->id) }}" class="edit-delete-links bg-red-600 text-white py-2 px-4 rounded hover:bg-red-500 transition duration-200">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Image Viewer -->
        <div id="imageModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center justify-center z-50">
            <div class="relative">
                <img id="modalImage" class="max-w-full max-h-screen rounded-lg shadow-lg">
                <button onclick="closeModal()"
                        class="absolute top-2 right-2 text-white bg-red-600 px-4 py-2 rounded-lg shadow-md hover:bg-red-500">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        // Show modal and display clicked image
        function showModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
        }

        // Close the modal
        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }
    </script>
</body>

</html>
