<!-- <ul class="widget__categories--menu">
    <li class="widget__categories--menu__list">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-dashboard-web menu-icon"></i>
            <span class="widget__categories--menu__text">Dashboard</span>
        </label>
    </li>
</ul> -->

<ul class="widget__categories--menu">
    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-users-alt-5 menu-icon"></i>
            <span class="widget__categories--menu__text">Astrologers</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('astrologer.index') }}">
                    <i class="icofont-users-alt-5 menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">All Astrologers</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('astrologer.create') }}">
                    <i class="icofont-contact-add menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Add Astrologer</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-rupee menu-icon"></i>
            <span class="widget__categories--menu__text">Recharge</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('plan.index') }}">
                    <i class="icofont-list menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">All Plans</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('plan.create') }}">
                    <i class="icofont-rupee-plus menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Add Plan</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-rupee menu-icon"></i>
            <span class="widget__categories--menu__text">Payments</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('payment.index') }}">
                    <i class="icofont-list menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">All Transactions</span>
                </a>
            </li>
        </ul>
    </li>

    <a href="{{ route('customer.index') }}" class="widget__categories--menu__list w-100">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-users menu-icon"></i>
            <span class="widget__categories--menu__text">Users</span>
        </label>
    </a>

    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-home menu-icon"></i>
            <span class="widget__categories--menu__text">Home Page</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('slider.index') }}">
                    <i class="icofont-multimedia menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Slider</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('testimonial.index') }}">
                    <i class="icofont-users-alt-5 menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Testimonial</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('popup.index') }}">
                    <i class="icofont-cube fs-1 menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Popup Box</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-papers menu-icon"></i>
            <span class="widget__categories--menu__text">Posts</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('post.index') }}">
                    <i class="icofont-ui-copy menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">All Posts</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('post.create') }}">
                    <i class="icofont-page menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">New Post</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('post-category.index') }}">
                    <i class="icofont-layout menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Categories</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="widget__categories--menu__list drop_menu">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-page menu-icon"></i>
            <span class="widget__categories--menu__text">Pages</span>
            <svg class="widget__categories--menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                height="8.394">
                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                    transform="translate(-6 -8.59)" fill="currentColor"></path>
            </svg>
        </label>
        <ul class="widget__categories--sub__menu">
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('page.index') }}">
                    <i class="icofont-page menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">All Pages</span>
                </a>
            </li>
            <li class="widget__categories--sub__menu--list">
                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                    href="{{ route('page.create') }}">
                    <i class="icofont-page menu-icon2"></i>
                    <span class="widget__categories--sub__menu--text">Create Page</span>
                </a>
            </li>
        </ul>
    </li>

<a href="{{ route('admin.queries') }}" class="widget__categories--menu__list w-100">
        <label class="widget__categories--menu__label d-flex align-items-center">
            <i class="icofont-users menu-icon"></i>
            <span class="widget__categories--menu__text">User Queries</span>
        </label>
    </a>


</ul>
