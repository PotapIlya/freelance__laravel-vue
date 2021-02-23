
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title ?? 'Title' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">

                    @if( isset($categories) )
                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">{{ $categories }}</a></li>
                    @endif
                    @if( isset($project) )
                        <li class="breadcrumb-item"><a href="{{ route('admin.project.index') }}">{{ $project  }}</a></li>
                    @endif
                    @if( isset($users) )
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">{{ $users }}</a></li>
                    @endif
                    <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>

                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>