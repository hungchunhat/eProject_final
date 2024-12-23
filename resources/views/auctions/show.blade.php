<x-layout>
    <section id="team" class="team">
        <div class="container section-title mb-5">
            <h2>Upcoming Auction</h2>
            <p>Explore and get ready to bid on the upcoming auction!</p>
        </div>
        <div class="container border-bottom border-secondary-subtle bg-white pb-3">
            <div class="row">
                <!-- Auction Information -->
                <div class="col-md-8">
                    <!-- Header -->
                    <div class="mb-4">
                        <h1 class="fs-4 fw-bold text-dark">
                            {{$auction->description}}
                        </h1>
                    </div>
                    <!-- Auction Details -->
                    <div class="mb-3">
                        <span class="fw-bold text-decoration-none">{{$auction->name}}</span> |
                        <span class="text-secondary text-decoration-none">Bid step: ${{$auction->bid_step}}</span>
                        <p class="mt-2 mb-0">
                            <span
                                class="fw-medium">Start time: {{\Carbon\Carbon::parse($auction->start_time)->format('l, M d, g:i A')}}</span><br>
                            <span
                                class="fw-medium">End time: {{\Carbon\Carbon::parse($auction->end_time)->format('l, M d, g:i A')}}</span><br>
                        </p>
                    </div>
                    <!-- Approval Button -->
                    @can('collector')
                        <div class="mb-4">
                            <p class="mb-2 text-muted">
                                Do you want your product to appear in this auction? -
                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                   data-bs-target="#productModal">
                                    Add product
                                </a>
                            </p>
                        </div>
                    @endcan
                    @can('admin')
                        <div class="mb-4">
                            <button class="btn btn-outline-danger" form="start-auction">Start this auction</button>
                        </div>
                        <form id="start-auction" method="post" action="{{route('auction.start',$auction->id)}}" style="display: none">
                            @csrf
                            @method('PATCH')
                        </form>
                    @endcan
                </div>

                <!-- Auction Logo -->
                <div class="col-md-4 d-flex justify-content-md-end justify-content-center align-items-center">
                    <img src="/storage/{{$auction->image}}" alt="Auction's theme"
                         style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px">
                </div>
            </div>
        </div>
        <div class="container justify-content-center mt-3">
            <h2 class="text-center my-3">Products in the auction</h2>
            @if($products->count() === 0)
                There is no product in the auction yet.
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
    </section>
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Choose a product to add into the auction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="location.reload()"></button>
                </div>
                <div class="modal-body">
                    <!-- Table -->
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @auth
                            @php
                                $products = Auth::user()->product()->where('action_type', 'own')->get()??[];
                            @endphp
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>${{$product->price}}</td>
                                    <td id="action{{$product->id}}">
                                        @if($product->status == 'in-auction'||$product->status == 'pending')
                                            <span id="add{{$product->id}}"
                                                  class="d-inline-flex align-items-center text-success fw-bold">
                                                <i class="bi bi-check-circle"> Done</i>
                                            </span>
                                        @else
                                            <button id='add{{$product->id}}' type="submit"
                                                    class="btn btn-success btn-sm addButton"
                                                    data-bs-id="{{$product->id}}">Add
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endauth
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <x-slot:script>
        <script type="module">
            document.addEventListener('DOMContentLoaded', function () {
                const addButtons = document.querySelectorAll('.addButton');
                addButtons.forEach(button => {
                    button.addEventListener('click', function (event) {
                        event.preventDefault();
                        const id1 = this.getAttribute('data-bs-id');
                        let data = {
                            product_id: id1,
                            auction_id: {{$auction->id}}
                        }
                        console.log(`Product ${id1}`);
                        axios.post('{{route('auctions.addProduct')}}', data)
                            .then(response => {
                                console.log(response);
                            })
                    }, {once: true});
                });
            })
            Echo.channel('addProduct')
                .listen('AddProduct', (e) => {
                    console.log('đây là sự kiện trả về:', e)
                    let parent = document.getElementById('action' + e.id);
                    let child = document.getElementById(`add${e.id}`);
                    if (e.status === 'pending') {
                        parent.removeChild(child);
                        let span = document.createElement('span');
                        span.setAttribute('id', `add${e.id}`);
                        span.setAttribute('class', 'd-inline-flex align-items-center text-success fw-bold');
                        span.innerHTML = '<i class="bi bi-check-circle"> Done</i>';
                        parent.appendChild(span);
                    } else {
                        parent.removeChild(child);
                        let button = document.createElement('button');
                        button.setAttribute('id', 'add' + e.id);
                        button.setAttribute('class', 'btn btn-success btn-sm addButton');
                        button.setAttribute('data-bs-id', e.id);
                        button.innerHTML = 'Add';
                        parent.appendChild(button);
                    }
                });
        </script>
    </x-slot:script>
</x-layout>
