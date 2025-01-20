<header>
    <!-- header top start -->
    <div class="bg-blackColor2 dark:bg-lightGrey10-dark hidden lg:block">


    </div>
    </div>


    <!-- navbar start -->
    <div
        class="transition-all duration-500 sticky-header z-medium dark:bg-whiteColor-dark">
        <nav>
            <div
                class="py-15px lg:py-0 px-15px lg:container 3xl:container-secondary-lg 4xl:container mx-auto relative">
                <div class="grid grid-cols-2 lg:grid-cols-12 items-center gap-15px">
                    <!-- navbar left -->
                    <div class="lg:col-start-1 lg:col-span-2">
                        <a href="../index.php" class="block"><img
                                src="../assets/images/logo/logo_1.png"
                                alt="Logo"
                                class="w-logo-sm lg:w-auto py-2"></a>
                    </div>
                    <!-- Main menu -->
                    <div class="hidden lg:block lg:col-start-3 lg:col-span-7">
                        <ul class="nav-list flex justify-center">
                            <li class="nav-item">
                                <a
                                    href="../index.php"
                                    class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../pages/courses.php"
                                    class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">
                                    Courses
                                </a>
                            </li>
                            <li class="nav-item">
                                <?php
                               
                                if (isset($_SESSION['user'])) {
                                    if ($_SESSION['role'] == 'Admin') {
                                        echo '<a href="../pages/Admin/admindashboard.php" class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">Admin Dashboard</a>';
                                    } elseif ($_SESSION['role'] == 'Teacher') {
                                        echo '<a href="../pages/teacher/teacherdash.php" class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">Teacher Dashboard</a>';
                                    } 
                                    
                                }                                         echo '<a href="../pages/dashboard.php" class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">Student Dashboard</a>';

                                ?>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="../pages/contact.php"
                                    class="px-5 lg:px-10px 2xl:px-15px 3xl:px-5 py-10 lg:py-5 2xl:py-30px 3xl:py-10 leading-sm 2xl:leading-lg text-base lg:text-sm 2xl:text-base font-semibold block group-hover:text-primaryColor dark:text-whiteColor hover:text-primaryColor">
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- navbar right -->
                    <div class="lg:col-start-10 lg:col-span-3">
                        <ul class="relative nav-list flex justify-end items-center">

                            <li class="hidden lg:block">
                                <a
                                    href="../pages/login.php"
                                    class="text-size-12 2xl:text-size-15 px-15px py-2 text-blackColor hover:text-whiteColor bg-whiteColor block hover:bg-primaryColor border border-borderColor1 rounded-standard font-semibold mr-[7px] 2xl:mr-15px dark:text-blackColor-dark dark:bg-whiteColor-dark dark:hover:bg-primaryColor dark:hover:text-whiteColor dark:hover:border-primaryColor"><i class="icofont-user-alt-5"></i></a>
                            </li>

                            <li class="block lg:hidden">
                                <button
                                    class="open-mobile-menu text-3xl text-darkdeep1 hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor">
                                    <i class="icofont-navigation-menu"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end -->

    <!-- mobile menu -->
    <div class="mobile-menu w-mobile-menu-sm md:w-mobile-menu-lg fixed top-0 -right-[280px] md:-right-[330px] transition-all duration-500 w-mobile-menu h-full shadow-dropdown-secodary bg-whiteColor dark:bg-whiteColor-dark z-high block lg:hidden">
        <button class="close-mobile-menu text-lg bg-darkdeep1 hover:bg-secondaryColor text-white px-[11px] py-[6px] absolute top-0 right-full hidden">
            <i class="icofont icofont-close-line"></i>
        </button>
        <!-- mobile menu wrapper -->
        <div class="px-5 md:px-30px pt-5 md:pt-10 pb-50px h-full overflow-y-auto">
            <!-- search input  -->
            <div class="pb-10 border-b border-borderColor dark:border-borderColor-dark">
                <form class="flex justify-between items-center w-full bg-whitegrey2 dark:bg-whitegrey2-dark px-15px py-[11px]">
                    <input type="text" placeholder="Search entire store..." class="bg-transparent w-4/5 focus:outline-none text-sm text-darkdeep1 dark:text-blackColor-dark">
                    <button class="block text-lg text-darkdeep1 hover:text-secondaryColor dark:text-blackColor-dark dark:hover:text-secondaryColor">
                        <i class="icofont icofont-search-2"></i>
                    </button>
                </form>
            </div>

            <!-- mobile menu items (no dropdowns) -->
            <div class="pt-8 pb-6 border-b border-borderColor dark:border-borderColor-dark">
                <ul>
                    <!-- Home -->
                    <li>
                        <a href="../index.php" class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor block">Home</a>
                    </li>

                    <!-- Courses -->
                    <li>
                        <a href="../pages/courses.php" class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor block">Courses</a>
                    </li>

                    <!-- Dashboard -->
                    <li>
                        <a href="../pages/dashboard.php" class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor block">Dashboard</a>
                    </li>

                    <!-- Contact Us -->
                    <li>
                        <a href="../pages/contact.php" class="leading-1 py-11px text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor block">Contact Us</a>
                    </li>
                </ul>
            </div>

            <!-- my account section (no dropdown) -->
            <div>
                <ul class="mt-9 mb-30px pb-9 border-b border-borderColor dark:border-borderColor-dark">
                    <li>
                        <a href="../pages/login.php" class="leading-1 text-darkdeep1 font-medium hover:text-secondaryColor dark:text-whiteColor dark:hover:text-secondaryColor block">My Account</a>
                    </li>
                </ul>
            </div>

            <!-- Mobile menu social area -->
            <div>
                <ul class="flex gap-6 items-center mb-5">
                    <li>
                        <a class="facebook" href="#"><i class="icofont icofont-facebook text-fb-color dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                    </li>
                    <li>
                        <a class="twitter" href="#"><i class="icofont icofont-twitter text-twiter-color dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                    </li>
                    <li>
                        <a class="pinterest" href="#"><i class="icofont icofont-pinterest dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                    </li>
                    <li>
                        <a class="instagram" href="#"><i class="icofont icofont-instagram dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                    </li>
                    <li>
                        <a class="google" href="#"><i class="icofont icofont-youtube-play dark:text-whiteColor dark:hover:text-secondaryColor"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>