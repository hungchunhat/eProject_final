<x-layout>
    <div class="container py-5">
        <!-- Profile Information Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Profile Information</h5>
                <small class="text-muted">Update your account's profile information and email address.</small>
            </div>
            <div class="card-body">
                @if(session('success1'))
                    <div class="alert alert-success">
                        {{ session('success1') }}
                    </div>
                @endif
                <form action="{{route('profile.update',Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{Auth::user()->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                               placeholder="Enter your address" value="{{Auth::user()->address}}">
                    </div>
                    @if($errors->any() && !$errors->hasBag('passwordForm'))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <button type="submit" class="btn form-btn">Save</button>
                </form>
            </div>
        </div>

        <!-- Update Password Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Update Password</h5>
                <small class="text-muted">Ensure your account is using a long, random password to stay secure.</small>
            </div>
            <div class="card-body">
                @if(session('success2'))
                    <div class="alert alert-success">
                        {{ session('success2') }}
                    </div>
                @endif
                <form method="POST" action="{{route('profile.password',Auth::user()->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name='current_password'
                               placeholder="Enter your current password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Enter your new password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" placeholder="Confirm your new password">
                    </div>
                    @if($errors->hasBag('passwordForm'))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->getBag('passwordForm')->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button type="submit" class="btn form-btn">Save</button>
                </form>
            </div>
        </div>
        <!-- Delete Account Section -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-danger">Delete Account</h5>
                <small class="text-muted">Once your account is deleted, all of its resources and data will be
                    permanently deleted. Before deleting your account, please download any data or information that you
                    wish to retain.</small>
            </div>
            <div class="card-body">
                <form id="delete-form" action="{{route('profile.destroy',Auth::user()->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button id="delete-btn" class="btn btn-danger">Delete Account</button>
                </form>

            </div>
        </div>
    </div>
    <x-slot:script>
        <script>
            document.querySelector('#delete-btn').addEventListener('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                    document.querySelector('#delete-form').submit();
                }
            });
        </script>
    </x-slot:script>
</x-layout>
