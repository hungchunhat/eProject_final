<x-layout>
    <section id="team" class="team">
        <div class="container section-title mb-5">
            <h2>Complete Auction</h2>
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
                </div>

                <!-- Auction Logo -->
                <div class="col-md-4 d-flex justify-content-center justify-content-md-end align-items-center">
                    <img src="/storage/{{$auction->image}}" alt="Auction's theme"
                         style="width: 200px; height: 200px; object-fit: cover; border-radius: 8px">
                </div>
            </div>
        </div>
        <div class="container justify-content-center mt-3">
            <h2 class="text-center my-3">Result</h2>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Product's name</th>
                        <th>Product's price</th>
                        <th>Bid's amount</th>
                        <th>Winner's name</th>
                        @auth
                            @if(auth()->user()->can('admin') || auth()->user()->can('collector'))
                                <th>Winner's email</th>
                            @endif
                        @endauth
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$result->product_name}}</td>
                            <td>{{$result->product_price}}</td>
                            <td class="fw-bold">{{$result->bid_price??'null'}}</td>
                            <td>{{$result->winner_name??'null'}}</td>
                            @auth
                                @if(auth()->user()->can('admin') || auth()->user()->can('collector'))
                                    <td>{{$result->winner_email ?? 'null'}}</td>
                                @endif
                            @endauth
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</x-layout>
