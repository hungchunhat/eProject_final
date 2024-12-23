<x-layout>
    <section id="team" class="team">
        <div class="container section-title mb-5">
            <h2>Manager</h2>
            <p>Manage all of your products in here</p>
        </div>
        <div class="container">
            <ul class="nav nav-tabs justify-content-center" id="managementTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#manage-user"
                            type="button" role="tab" aria-controls="manage-user" aria-selected="true">
                        Manage User
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#manage-product"
                            type="button" role="tab" aria-controls="manage-product" aria-selected="false">
                        Manage Product
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="auction-tab" data-bs-toggle="tab" data-bs-target="#manage-auction"
                            type="button" role="tab" aria-controls="manage-auction" aria-selected="false">
                        Manage Auction
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="feedback-tab" data-bs-toggle="tab" data-bs-target="#manage-feedback"
                            type="button" role="tab" aria-controls="manage-feedback" aria-selected="false">
                        Manage Feedback
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-4" id="managementTabsContent">
                <!-- Manage User Content -->
                <div class="tab-pane fade show active" id="manage-user" role="tabpanel" aria-labelledby="user-tab">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Roll</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr id="user{{$user->id}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->address !== null)
                                                {{ $user->address }}
                                            @else
                                                No Address
                                            @endif
                                        </td>
                                        <td id="role{{$user->id}}">{{$user->role}}</td>
                                        <td id="action{{$user->id}}">
                                            <button type="button" class="btn btn-sm btn-danger"
                                                    id="deleteU{{$user->id}}" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUModal" data-bs-id="{{$user->id}}">Delete
                                            </button>
                                            <button type="button" class="btn btn-sm btn-warning"
                                                    id="changeU{{$user->id}}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#changeUModal" data-bs-id="{{$user->id}}">Change
                                                Role
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- Manage Product Content -->
                <div class="tab-pane fade" id="manage-product" role="tabpanel" aria-labelledby="product-tab">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Owner</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr id="product{{$product->id}}">
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->status}}</td>
                                        <td>
                                            @if($product->owner->isNotEmpty())
                                                {{ $product->owner->first()->name }}
                                            @else
                                                No owner
                                            @endif
                                        </td>
                                        <td id="action{{$product->id}}">
                                            <!-- Button detail modal -->
                                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#detailModal{{$product->id}}">
                                                <i class="bi bi-info-circle"> Detail</i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="detailModal{{$product->id}}" tabindex="-1"
                                                 aria-labelledby="detailModal{{$product->id}}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="detailModal{{$product->id}}Label">Product's
                                                                detail</h1>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="card">
                                                                <img src="/storage/{{$product->image}}"
                                                                     class="card-img-top" alt="{{$product->name}}"
                                                                     style="object-fit: cover; height: 300px;">
                                                                <div class="card-body text-center">
                                                                    <h5 class="card-title">{{$product->name}}</h5>
                                                                    <p class="card-text">
                                                                        <strong>Category:</strong> {{$product->category->name??''}}
                                                                    </p>
                                                                    <p class="card-text">{{$product->description??''}}</p>
                                                                    <p class="card-text text-success fw-bold"><strong>Price:</strong>
                                                                        ${{$product->price}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger placeBid modal -->
                                            <button id="deleteAction-{{$product->id}}" type="button"
                                                    class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal" data-bs-id="{{$product->id}}">
                                                <span><i class="bi bi-trash"> Delete</i></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <!-- Manage Auction Content -->
                <div class="tab-pane fade" id="manage-auction" role="tabpanel" aria-labelledby="auction-tab">
                    <div class="accordion mb-3" id="auctionAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="auctionAccordionHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#auctionAccordionCollapse"
                                        aria-expanded="true" aria-controls="auctionAccordionCollapse">
                                    Add New Auction
                                </button>
                            </h2>
                            <div id="auctionAccordionCollapse" class="accordion-collapse collapse"
                                 aria-labelledby="auctionAccordionHeading"
                                 data-bs-parent="#auctionAccordion">
                                <div class="accordion-body">
                                    <form method="post" action="{{route('auction.store')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="auctionName" class="form-label">Auction Name</label>
                                            <input type="text" class="form-control" id="auctionName" name="name"
                                                   placeholder="Enter auction name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"
                                                      placeholder="Enter description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="startTime" class="form-label">Start Time</label>
                                            <input type="datetime-local" class="form-control" id="startTime"
                                                   name="start_time">
                                        </div>
                                        <div class="mb-3">
                                            <label for="endTime" class="form-label">End Time</label>
                                            <input type="datetime-local" class="form-control" id="endTime"
                                                   name="end_time">
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-select" id="category" name="category">
                                                <option value="normal" selected>Normal</option>
                                                <option value="sponsored">Sponsored</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="bidStep" class="form-label">Bid Step</label>
                                            <input type="number" class="form-control" id="bidStep" name="bid_step"
                                                   placeholder="Enter bid step">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                   accept="image/*">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped text-center">
                            <thead class="table-light">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($auctions as $auction)
                                <tr id="auction{{$auction->id}}">
                                    <td>{{ $auction->id }}</td>
                                    <td>{{ $auction->name }}</td>
                                    <td>{{ $auction->category }}</td>
                                    <td>{{ $auction->status }}</td>
                                    <td>
                                        <a href="{{route('auction.show',$auction->id)}}" class="btn btn-sm btn-primary"
                                           target="_blank">View</a>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteAModal" data-bs-id="{{ $auction->id }}">Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Manage Feedback Content -->
                <div class="tab-pane fade" id="manage-feedback" role="tabpanel" aria-labelledby="feedback-tab">
                    <h3>Manage Feedback</h3>
                    <p>Implement feedback management functionality here.</p>
                </div>
            </div>
        </div>
        <!-- Modal Product -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this product?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete User -->
        <div class="modal fade" id="deleteUModal" tabindex="-1" aria-labelledby="deleteUModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteUModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmUDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Change Role -->
        <div class="modal fade" id="changeUModal" tabindex="-1" aria-labelledby="changeUModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="changeUModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmChange">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete Auction -->
        <div class="modal fade" id="deleteAModal" tabindex="-1" aria-labelledby="deleteUModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteUModalLabel">You gud bro?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this auction?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmADelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-slot:script>
        <script type="module">
            let id = null;
            let deleteAction = document.getElementById('deleteModal');
            let deleteActionBtn = document.getElementById('confirmDelete');
            let closeBtn = deleteAction.querySelector('.btn-close');
            deleteAction.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                id = button.getAttribute('data-bs-id');
                console.log(id);
                deleteActionBtn.disabled = false;
            })
            deleteActionBtn.addEventListener('click', function () {
                deleteActionBtn.disabled = true;
                let data = {
                    product_id: id,
                }
                axios.delete('{{route('product.destroy')}}', {data})
                    .then(function (response) {
                        console.log(response);
                        let row = document.getElementById('product' + id);
                        row.remove();
                        closeBtn.click();
                    }).catch(function (error) {
                    console.error('Error:', error.response.data || error.message);
                    alert('Failed to delete the product. Please try again.');
                }).finally(function () {
                    deleteActionBtn.disabled = false;
                });
            })
        </script>
        <script type="module">
            let id = null;
            let deleteU = document.getElementById('deleteUModal');
            let deleteUBtn = document.getElementById('confirmUDelete');
            let closeBtn = deleteU.querySelector('.btn-close');
            deleteU.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                id = button.getAttribute('data-bs-id');
                console.log(id);
                deleteUBtn.disabled = false;
            })
            deleteUBtn.addEventListener('click', function () {
                deleteUBtn.disabled = true;
                let data = {
                    user_id: id,
                }
                axios.delete('{{route('user.destroy')}}', {data})
                    .then(function (response) {
                        console.log(response);
                        let row = document.getElementById('user' + id);
                        row.remove();
                        closeBtn.click();
                    }).catch(function (error) {
                    console.error('Error:', error.response.data || error.message);
                    alert('Failed to delete the user. Please try again.');
                }).finally(function () {
                    deleteUBtn.disabled = false;
                });
            })
        </script>
        <script type="module">
            let id = null;
            let changeU = document.getElementById('changeUModal');
            let changeUBtn = document.getElementById('confirmChange');
            let closeBtn = changeU.querySelector('.btn-close');
            changeU.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                id = button.getAttribute('data-bs-id');
                console.log(id);
                changeUBtn.disabled = false;
            })
            changeUBtn.addEventListener('click', function () {
                changeUBtn.disabled = true;
                let data = {
                    user_id: id,
                }
                axios.patch('{{route('user.changeRole')}}', data)
                    .then(function (response) {
                        console.log(response);
                        let row = document.getElementById('role' + id);
                        if (row.innerHTML === 'collector') {
                            row.innerHTML = 'buyer';
                        } else {
                            row.innerHTML = 'collector';
                        }
                        closeBtn.click();
                    }).catch(function (error) {
                    console.error('Error:', error.response.data || error.message);
                    alert('Failed to delete the user. Please try again.');
                }).finally(function () {
                    changeUBtn.disabled = false;
                })
            })
        </script>
        <script type="module">
            let id = null;
            let deleteA = document.getElementById('deleteAModal');
            let deleteABtn = document.getElementById('confirmADelete');
            let closeBtn = deleteA.querySelector('.btn-close');
            deleteA.addEventListener('show.bs.modal', function (event) {
                let button = event.relatedTarget;
                id = button.getAttribute('data-bs-id');
                console.log(id);
                deleteABtn.disabled = false;
            })
            deleteABtn.addEventListener('click', function () {
                deleteABtn.disabled = true;
                let data = {
                    auction_id: id,
                }
                axios.delete('{{route('auction.destroy')}}', {data})
                    .then(function (response) {
                        console.log(response);
                        let row = document.getElementById('auction' + id);
                        row.remove();
                        closeBtn.click();
                    }).catch(function (error) {
                    console.error('Error:', error.response.data || error.message);
                    alert('Failed to delete the auction. Please try again.');
                }).finally(function () {
                    deleteABtn.disabled = false;
                })
            })
        </script>
    </x-slot:script>
</x-layout>
