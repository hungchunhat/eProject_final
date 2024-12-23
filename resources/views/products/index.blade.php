<x-layout>
    <section id="team" class="team">

        <!-- Section Title -->
        <div class="container section-title mb-5" data-aos="fade-up">
            <h2>Products</h2>
            <p>Products are items or services created to meet the needs and desires of customers, offering value and
                solutions in everyday life.</p>
        </div><!-- End Section Title -->
        <div class="container d-flex justify-content-between align-items-center mb-4" data-aos="fade-up">
            <div class="btn-group" role="group" aria-label="Product Categories">
                <a href="/products" class="btn form-btn{{ !request()->has('category_id') ? '-active' : '' }} category-btn">All</a>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => '1']) }}" class="btn form-btn{{request('category_id')==1?'-active':''}} category-btn">Fine Art</a>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => '2']) }}" class="btn form-btn{{request('category_id')==2?'-active':''}} category-btn">Antique</a>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => '3']) }}" class="btn form-btn{{request('category_id')==3?'-active':''}} category-btn">Furniture</a>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => '4']) }}" class="btn form-btn{{request('category_id')==4?'-active':''}} category-btn">Collectible</a>
                <a href="{{ request()->fullUrlWithQuery(['category_id' => '5']) }}" class="btn form-btn{{request('category_id')==5?'-active':''}} category-btn">Others</a>
            </div>
            <form class="d-flex" id="search-form" method="GET" action="{{route('product.index')}}">
                @foreach(request()->except('name') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <input type="text" name="name" class="form-control me-2" placeholder="Search by name" aria-label="Search">
                <button type="submit" class="btn form-btn"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <div class="container justify-content-center mt-3">
            @if($products->isEmpty())
                <p class="text-center">No products found</p>
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
                            @if(($loop->index +1) %4===0|| $loop->last)
                        </div>
                    @endif
                @endforeach
            @endif

        </div>
        <div class="container d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </section>
</x-layout>
