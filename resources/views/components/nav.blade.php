<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" data-accordion="false" id="navigation">
    @foreach ($items as $item)
        <li class="nav-item">
            <a href="{{ route($item['route']) }}" class="nav-link">
                <i class="{{ $item['icon'] }}"></i>
                <p>
                    {{ $item['title'] }}
                </p>
            </a>

        </li>
    @endforeach
</ul>
