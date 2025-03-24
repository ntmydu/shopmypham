<header class="header">

    <div class="alert">
        <div class="container">
            <p class="alert-text">Miễn phí giao hàng toàn quốc với hóa đơn từ 199.000 +</p>
        </div>
    </div>

    <!-- Header desktop -->
    <div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <div class="dropdown">
                                <div class="dropdown-btn">
                                    Sản phẩm <span class="dropdown-arrrow"> </span>
                                </div>
                                <ul class="dropdown-menu">
                                    @foreach($menus as $menu)
                                    @if($menu->parent_id === 0)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{route('product.list', $menu->id)}}">{{$menu->name}}
                                            <span class="arrow"> &raquo;</span>
                                        </a>

                                        @if($menus->contains('parent_id', $menu->id))
                                        <!-- Kiểm tra xem có mục nào có parent_id bằng id của menu này không -->
                                        <ul class="dropdown-menu dropdown-submenu">
                                            @foreach($menus as $submenu)
                                            <!-- Lặp qua lại để tìm các sub-menu -->
                                            @if($submenu->parent_id === $menu->id)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{route('product.list', $submenu->id)}}">{{$submenu->name}}</a>
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#">Bài viết</a>
                        </li>
                        <li>
                            <a href="#">Liên Hệ</a>
                        </li>
                    </ul>
                </div>
                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{asset('images/logo.svg')}}" alt="IMG-LOGO">
                </a>


                <div class="header-actions">
                    <?php
                    $totalQuantity = 0;
                    ?>
                    @if(session('cart'))
                    @foreach(session('cart') as $item)
                    <?php
                    $totalQuantity += $item['quantity'];
                    ?>
                    @endforeach
                    @endif
                    <div class="wrap-icon-header flex-w flex-r-m">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                            data-notify="{{$totalQuantity}}">
                            <a href="{{ route('cart.index') }}">
                                <i class="zmdi zmdi-shopping-cart"></i>

                            </a>

                        </div>
                        <button class="header-action-btn" aria-label="favourite item">
                            <i class="lni lni-user-4"></i>
                        </button>


                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img src="{{asset('images/logo.svg')}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                data-notify="2">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">Trang Chủ</a> </li>



            <li>
                <a href="contact.html">Liên Hệ</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>


<script>
const dropdownMenu = document.querySelector(".dropdown-menu")
const dropdownArrow = document.querySelector('.dropdown-arrrow')
const dropdown = document.querySelector('.dropdown').addEventListener('click', (e) => {
    if (dropdownMenu.style.display == 'block') {
        dropdownMenu.style.display = 'none'
        dropdownArrow.style.rotate = '90deg'
    } else {
        dropdownMenu.style.display = 'block'
        dropdownArrow.style.rotate = '-90deg'
    }
})
</script>