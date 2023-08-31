<ul class="sw-25 side-menu mb-0 primary scrolable-menu" id="menuSide">
    <li>
        <a href="#" data-bs-target="#dashboard">
            <i data-acorn-icon="home" class="icon" data-acorn-size="18"></i>
            <span class="label">Dashboard</span>
        </a>
        <ul>
            <li>
                <a href="Dashboard.GettingStarted.html">
                    <i data-acorn-icon="navigate-diagonal" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Getting Started</span>
                </a>
            </li>
            <li>
                <a href="Dashboard.Analysis.html">
                    <i data-acorn-icon="chart-4" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Analysis</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" data-bs-target="#services">
            <i data-acorn-icon="grid-1" class="icon" data-acorn-size="18"></i>
            <span class="label">Services</span>
        </a>
        <ul>
            <li>
                <a href="Services.Database.html">
                    <i data-acorn-icon="database" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Database</span>
                </a>
            </li>
            <li>
                <a href="Services.Storage.html">
                    <i data-acorn-icon="file-image" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Storage</span>
                </a>
            </li>
            <li>
                <a href="Services.Hosting.html">
                    <i data-acorn-icon="router" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Hosting</span>
                </a>
            </li>
            <li>
                <a href="Services.Users.html">
                    <i data-acorn-icon="user" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('notice') }}">
                    <i data-acorn-icon="book" class="icon" data-acorn-size="18"></i>
                    <span class="label">Notice</span>
                </a>
            </li>
            <li>
                <a href="{{ route('important-links') }}">
                    <i data-acorn-icon="link" class="icon" data-acorn-size="18"></i>
                    <span class="label">Important Links</span>
                </a>
            </li>
            <li>
                <a href="{{ route('homepage-widgets') }}">
                    <i data-acorn-icon="notebook-1" class="icon" data-acorn-size="18"></i>
                    <span class="label">Homepage School Widgets</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <div class="accordion">
            <div class="accordion__collapsible">
                <div class="collapsible__header">
                    <div>
                        <i data-acorn-icon="gear" class="icon" data-acorn-size="18"></i>
                        <span>Settings</span>
                    </div>
                </div>
                <div class="collapsible__content">
                    <ul>
                        <li>
                            <a href="{{ route('admin-settings') }}">
                                General
                            </a>
                        </li>
                        <li><a href="{{ route('school-settings') }}">School Profile</a></li>
                        <li><a href="{{ route('header-footer-settings') }}">Header & Footer</a></li>
                        <li><a href="{{ route('role-settings') }}">Roles</a></li>
                        <li><a href="{{ route('permission-settings') }}">Permission</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="#" data-bs-target="#account">
            <i data-acorn-icon="user" class="icon" data-acorn-size="18"></i>
            <span class="label">Account</span>
        </a>
        <ul>
            <li>
                <a href="Account.Settings.html">
                    <i data-acorn-icon="gear" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Settings</span>
                </a>
            </li>
            <li>
                <a href="Account.Billing.html">
                    <i data-acorn-icon="inbox" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Billing</span>
                </a>
            </li>
            <li>
                <a href="Account.Security.html">
                    <i data-acorn-icon="shield" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Security</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <a href="#" data-bs-target="#support">
            <i data-acorn-icon="help" class="icon" data-acorn-size="18"></i>
            <span class="label">Support</span>
        </a>
        <ul>
            <li>
                <a href="Support.Docs.html">
                    <i data-acorn-icon="file-empty" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Docs</span>
                </a>
            </li>
            <li>
                <a href="Support.KnowledgeBase.html">
                    <i data-acorn-icon="notebook-1" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Knowledge Base</span>
                </a>
            </li>
            <li>
                <a href="Support.Tickets.html">
                    <i data-acorn-icon="bookmark" class="icon d-none" data-acorn-size="18"></i>
                    <span class="label">Tickets</span>
                </a>
            </li>
        </ul>
    </li>
</ul>
