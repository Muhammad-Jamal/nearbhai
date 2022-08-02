<div class="container-fluid">
    <div class="row bg-primary py-3">
        <div class="md-4">
           <a href="{{ route('pages.index') }}" class="text-heading lh-1 sidebar-link {{Request::segment(1) == 'home' ? 'text-dark' : ''}}">
                <h4 class="sidebar-item-text ml-3">NearBhai</h4>
            </a>
        </div>
    </div>
</div>