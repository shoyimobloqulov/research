<div class="adminuiux-sidebar">
    <div class="adminuiux-sidebar-inner">
        <div class="px-3 not-iconic mt-2">
            <div class="row gx-3">
                <div class="col align-self-center"><h6 class="fw-medium">Opportunities </h6></div>
            </div>
        </div>
        <ul class="nav flex-column menu-active-line">
            <li class="nav-item">
                <a href="{{ route('topics') }}" class="nav-link">
                    <i class="menu-icon bi bi-chat-left-text"></i>
                    <span class="menu-name">Topics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('contact') }}" class="nav-link">
                    <i class="menu-icon bi bi-person-lines-fill"></i>
                    <span class="menu-name">Contact details</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('study') }}" class="nav-link">
                    <i class="menu-icon bi bi-book"></i>
                    <span class="menu-name">Self-study</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('glossary') }}" class="nav-link">
                    <i class="menu-icon bi bi-bookmark-star"></i>
                    <span class="menu-name">Glossary</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="menu-icon bi bi-info-circle"></i>
                    <span class="menu-name">About</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('test') }}" class="nav-link">
                    <i class="menu-icon bi bi-bookmark-check"></i>
                    <span class="menu-name">Test</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto"></div>

        <ul class="nav flex-column menu-active-line">

            <li class="nav-item"><a href="{{ route('settings') }}" class="nav-link"><i class="menu-icon"
                                                                                       data-feather="settings"></i>
                    <span class="menu-name">Settings</span></a></li>
        </ul>
    </div>
</div>
