<x-layout>
    <section id="team" class="team">

        <!-- Section Title -->
        <div class="container section-title mb-5" data-aos="fade-up">
            <h2>Edit product</h2>
        </div><!-- End Section Title -->
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="name" class="form-label">Product's Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name"
                           value="{{$product->name}}" required>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-select" required>
                        <option value="" disabled>Select a category</option>
                        <option value="1" {{$product->category_id == 1?'selected':''}}>Fine Art</option>
                        <option value="2" {{$product->category_id == 2?'selected':''}}>Antique</option>
                        <option value="3" {{$product->category_id == 3?'selected':''}}>Furniture</option>
                        <option value="4" {{$product->category_id == 4?'selected':''}}>Collectible</option>
                        <option value="5" {{$product->category_id == 5?'selected':''}}>Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"
                              placeholder="Enter product description">{{$product->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Enter product price"
                           value="{{$product->price}}" required>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>

                <!-- Preview Image Section -->
                <div class="mb-3">
                    <div id="image-preview" class="mt-2"></div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <x-slot:script>
        <script type="module">
            document.getElementById('image').addEventListener('change', function (event) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.innerHTML = "";

                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = "Preview Image";
                        img.style.maxWidth = "100%";
                        img.style.height = "auto";
                        imagePreview.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </x-slot:script>
</x-layout>
