<div id="clickable" data-bs-toggle="modal" data-bs-target="#exampleModal{{$id}}"
     class="col-lg-3 col-md-6 d-flex align-items-stretch justify-content-center" data-aos="fade-up"
     data-aos-delay="200">
    <div class="team-member">
        <div class="member-img" style="width: 300px; height: 300px; overflow: hidden;">
            <img src="/storage/{{$src}}" class="img-fluid" style="object-fit: cover;width: 100%; height: 100%;" alt="">
        </div>
        <div class="member-info">
            <h4>{{$name}}</h4>
            <span>${{$price}}</span>
            @if($status == 'active')
                <div class="status-badge-p bg-black text-white">Active</div>
            @elseif($status == 'pending')
                <div class="status-badge-p bg-black text-white">Wait for approve</div>
            @elseif($status == 'in-auction')
                <div class="status-badge-p bg-danger text-white">Coming in live auction</div>
            @else
                <div class="status-badge-p bg-black text-white">Sold</div>
            @endif
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$id}}" tabindex="-1" aria-labelledby="exampleModal{{$id}}Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModal{{$id}}Label">Product's detail</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <img src="/storage/{{$src}}" class="card-img-top" alt="{{$name}}"
                         style="object-fit: cover; height: 300px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{$name}}</h5>
                        <p class="card-text"><strong>Category:</strong> {{$category??''}}</p>
                        <p class="card-text">{{$description??''}}</p>
                        <p class="card-text text-success fw-bold"><strong>Price:</strong> ${{$price}}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @can('edit-product',\App\Models\Product::find($id))
                    <a href="{{route('product.edit',$id)}}" class="btn form-btn">Edit</a>
                @endcan
                @can('user')
                    <button type="submit" class="btn btn-outline-danger" form="fav-form{{$id}}">
                        <i class="bi bi-heart{{ Auth::user()->product()->wherePivot('product_id', $id)->wherePivot('action_type', 'fav')->exists() ? '-fill' : '' }}"></i>
                    </button>
                    <form action="{{route('product.fav',$id)}}" method="POST" style="display: none;"
                          id="fav-form{{$id}}">
                        @csrf
                    </form>
                @endcan
                @can('admin')
                    @if ($status == 'pending')
                        <button type="submit" class="btn btn-outline-success" form="approve-form{{$id}}">Approval</button>
                        <form action="{{route('product.approve',$id)}}" method="POST" style="display: none;"
                              id="approve-form{{$id}}">
                            @csrf
                        </form>
                    @elseif($status == 'in-auction')
                        <button type="submit" class="btn btn-outline-danger" form="reject-form{{$id}}">Reject</button>
                        <form action="{{route('product.reject',$id)}}" method="POST" style="display: none;"
                              id="reject-form{{$id}}">
                            @csrf
                        </form>
                    @else
                        hehe
                    @endif
                @endcan
            </div>
        </div>
    </div>
</div>
