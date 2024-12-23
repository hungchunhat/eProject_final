<x-layout>
    <section id="team" class="team">
        <div class="container section-title mb-5">
            <h2>Watch List</h2>
            <p>Your favorite products list</p>
        </div>
        @if($errors->any())
            <div class="alert alert-danger container">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @can('collector')
        <div class="accordion container mb-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Add Product
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf <!-- Bảo vệ chống CSRF -->

                            <!-- Product's Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Product's Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter product name" required>
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id" id="category" class="form-select" required>
                                    <option value="" disabled selected>Select a category</option>
                                    <option value="1">Fine Art</option>
                                    <option value="2">Antique</option>
                                    <option value="3">Furniture</option>
                                    <option value="4">Collectible</option>
                                    <option value="5">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" name="price" id="price" class="form-control" placeholder="Enter product price" required>
                            </div>

                            <!-- Image Upload -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Product Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
                            </div>

                            <!-- Preview Image Section -->
                            <div class="mb-3">
                                <div id="image-preview" class="mt-2">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endcan
        <!-- Options for Purchased Products and Favorite Products -->
        <div class="container">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-4 justify-content-center" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link active"
                        id="purchased-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#purchased"
                        type="button"
                        role="tab"
                        aria-controls="purchased"
                        aria-selected="true">
                        Purchased Products
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button
                        class="nav-link"
                        id="favorite-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#favorite"
                        type="button"
                        role="tab"
                        aria-controls="favorite"
                        aria-selected="false">
                        Favorite Products
                    </button>
                </li>
                @can('collector')
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="own-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#own"
                            type="button"
                            role="tab"
                            aria-controls="own"
                            aria-selected="false">
                            Your Products
                        </button>
                    </li>
                @endcan
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="productTabsContent">
                <!-- Purchased Products -->
                <div
                    class="tab-pane fade show active"
                    id="purchased"
                    role="tabpanel"
                    aria-labelledby="purchased-tab">
                    @if($products->isEmpty())
                        <p>You have no purchased products</p>
                    @else
                        @foreach($products as $product)
                            @if(($loop->index) % 4 ===0)
                                <div class="row gy-4 justify-content-center mb-5">
                                    @endif
                                    <x-card-product>
                                        <x-slot:id>
                                            {{$product->id}}
                                        </x-slot:id>
                                        <x-slot:description>
                                            {{$product->description}}
                                        </x-slot:description>
                                        <x-slot:category>
                                            {{$product->category->name}}
                                        </x-slot:category>
                                        <x-slot:src>
                                            {{$product->image}}
                                        </x-slot:src>
                                        <x-slot:price>
                                            {{$product->price}}
                                        </x-slot:price>
                                        <x-slot:name>
                                            {{$product->name}}
                                        </x-slot:name>
                                        <x-slot:status>
                                            {{$product->status}}
                                        </x-slot:status>
                                    </x-card-product>
                                    @if(($loop->index +1) %4===0 || $loop->last)
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Favorite Products -->
                <div
                    class="tab-pane fade"
                    id="favorite"
                    role="tabpanel"
                    aria-labelledby="favorite-tab">
                    @if($favs->isEmpty())
                        <p>You have no favorite products</p>
                    @else
                        @foreach($favs as $fav)
                            @if(($loop->index) % 4 ===0)
                                <div class="row gy-4 justify-content-center mb-5">
                                    @endif
                                    <x-card-product>
                                        <x-slot:id>
                                            {{$fav->id}}
                                        </x-slot:id>
                                        <x-slot:description>
                                            {{$fav->description}}
                                        </x-slot:description>
                                        <x-slot:category>
                                            {{$fav->category->name}}
                                        </x-slot:category>
                                        <x-slot:src>
                                            {{$fav->image}}
                                        </x-slot:src>
                                        <x-slot:price>
                                            {{$fav->price}}
                                        </x-slot:price>
                                        <x-slot:name>
                                            {{$fav->name}}
                                        </x-slot:name>
                                        <x-slot:status>
                                            {{$fav->status}}
                                        </x-slot:status>
                                    </x-card-product>
                                    @if(($loop->index +1) %4===0 || $loop->last)
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>

                <!-- Your Products -->
                @can('collector')
                    <div
                        class="tab-pane fade"
                        id="own"
                        role="tabpanel"
                        aria-labelledby="own-tab">
                        @if($owns->isEmpty())
                            <p>You have no purchased products</p>
                        @else
                            @foreach($owns as $own)
                                @if(($loop->index) % 4 ===0)
                                    <div class="row gy-4 justify-content-center mb-5">
                                        @endif
                                        <x-card-product>
                                            <x-slot:id>
                                                {{$own->id}}
                                            </x-slot:id>
                                            <x-slot:description>
                                                {{$own->description}}
                                            </x-slot:description>
                                            <x-slot:category>
                                                {{$own->category->name}}
                                            </x-slot:category>
                                            <x-slot:src>
                                                {{$own->image}}
                                            </x-slot:src>
                                            <x-slot:price>
                                                {{$own->price}}
                                            </x-slot:price>
                                            <x-slot:name>
                                                {{$own->name}}
                                            </x-slot:name>
                                            <x-slot:status>
                                                {{$own->status}}
                                            </x-slot:status>
                                        </x-card-product>
                                        @if(($loop->index +1) %4===0 || $loop->last)
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                @endcan
            </div>
        </div>
    </section>
    <x-slot:script>
        <script type="module">
            document.getElementById('image').addEventListener('change', function(event) {
                const imagePreview = document.getElementById('image-preview');
                imagePreview.innerHTML = ""; // Xóa nội dung trước đó

                const file = event.target.files[0]; // Lấy file được chọn
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result; // Set src cho ảnh bằng data URL
                        img.alt = "Preview Image";
                        img.style.maxWidth = "100%";
                        img.style.height = "auto";
                        imagePreview.appendChild(img);
                    };

                    reader.readAsDataURL(file); // Đọc file ảnh dưới dạng URL
                }
            });
        </script>
    </x-slot:script>
</x-layout>
