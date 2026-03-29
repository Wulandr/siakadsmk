{{-- header --}}
@include('layouts.header')
{{-- /header --}}

<body class="ltr main-body app sidebar-mini">
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <div class="app">
        <div class="page">
            <div>
                @include('layouts/main-header')
                @include('layouts/main-sidebar')
            </div>
            <div id="content-page" class="main-content app-content">
                <div class="main-container container-fluid">

                    <!-- breadcrumb -->
                    <div class="breadcrumb-header justify-content-between">
                        <div class="left-content">
                            <span class="main-content-title mg-b-0 mg-b-lg-1">Edit User</span>
                        </div>
                        <div class="justify-content-center mt-2">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ADMIN</a></li>
                                <li class="breadcrumb-item" aria-current="page">User</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        <h5 class="card-title mg-b-20">Edit User</h5>
                                    </div>
                                    <form class="form-horizontal" id="xform1" method="post"
                                        action="{{ route('user.processUpdate', ['user' => $user]) }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Nama
                                                User</label>
                                            <input name="name" id="name" value="{{ old('name', $user->name) }}"
                                                type=" text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="main-content-label tx-11 tx-medium tx-gray-600">Email</label>
                                            <input name="email" id="email"
                                                value="{{ old('email', $user->email) }}" type="text"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" class="form-control">
                                                @foreach ($tabelRole as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ old('role', $user->role) == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- multiple row -->
                                        {{-- @include('pengaturan/user/role_increment') --}}

                                        <?php $i = 0; ?>
                                        <input name="created_at" id="created_at" type="hidden"
                                            value="<?= date('Y-m-d') ?>">
                                        <input name="updated_at" id="updated_at" type="hidden"
                                            value="<?= date('Y-m-d') ?>">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    </form>
                                    <br />

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Footer opened -->
        @include('layouts.footer')
        <!-- Footer closed -->
    </div>

</body>
{{-- script --}}
@include('layouts.script')
{{-- /script --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple2').select2();
    });
    $(document).ready(function() {
        $('.js-example-basic-multiple3').select2();
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

</html>
