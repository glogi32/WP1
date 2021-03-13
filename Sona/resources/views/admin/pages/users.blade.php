@extends("layouts.adminTemplate")

@section("content")
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    @empty($form)
                        @include("admin.components.users.form")
                    @endempty

                    @isset($form)
                        @switch($form)
                            @case('edit')
                            @include('Admin.components.users.formEdit')
                            @break
                            @case('add')
                            @include('Admin.components.users.formAdd')
                            @break
                        @endswitch
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endsection
