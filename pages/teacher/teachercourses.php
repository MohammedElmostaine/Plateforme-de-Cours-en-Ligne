<?php
session_start();
require_once "../../db/connection.php";
require_once '../../classes/user.php';

if (isset($_SESSION['user'])) {
    $user = unserialize($_SESSION['user']);
    if ($user->getRole() !== 'Teacher') {
        header('Location: ../../index.php');
        exit();
    }
} else {
    header('Location: ../../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.themewin.com/edurcok-preview-tailwind/edurock/pages/dashboards/admin-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jan 2025 03:29:09 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile| Edurock - Education LMS Template</title>
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="../../assets/images/favicon.ico">
    <!-- link stylesheet -->
    <link rel="stylesheet" href="../../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../../assets/css/popup.css">

    <link rel="stylesheet" href="../../assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../../assets/css/video-modal.css">
    <link rel="stylesheet" href="../../assets/css/aos.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body
    class="relative font-inter font-normal text-base leading-[1.8] bg-bodyBg dark:bg-bodyBg-dark">
    <!-- preloader -->
    <div
        class="preloader flex fixed top-0 left-0 h-screen w-full items-center justify-center z-xxl bg-whiteColor opacity-100 visible transition-all duration-700">
        <!-- spinner -->
        <div
            class="w-90px h-90px border-5px border-t-blue border-r-blue border-b-blue-light border-l-blue-light rounded-full animate-spin-infinit"></div>
        <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
            <img src="../../assets/images/pre.png" alt="" class="h-10 w-10 block">
        </div>
    </div>
    <!-- theme fixed shadow -->
    <div>
        <div class="fixed-shadow left-[-250px]"></div>
        <div class="fixed-shadow right-[-250px]"></div>
    </div>

    <!-- theme controller -->
    <div
        class="fixed top-[100px] 2xl:top-[300px] transition-all duration-300 right-[-50px] hover:right-0 z-xl">
        <button
            class="theme-controller w-90px h-10 bg-primaryColor dark:bg-whiteColor-dark rounded-l-lg2 text-whiteColor px-10px flex items-center dark:shadow-theme-controller">
            <!-- dark -->
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="mr-10px w-5 block dark:hidden"
                viewBox="0 0 512 512">
                <path
                    d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="32"></path>
            </svg>
            <span class="text-base block dark:hidden">Dark</span>
            <!-- light -->
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="hidden mr-10px w-5 dark:block"
                viewBox="0 0 512 512">
                <path
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-miterlimit="10"
                    stroke-width="32"
                    d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"></path>
                <circle
                    cx="256"
                    cy="256"
                    r="80"
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-miterlimit="10"
                    stroke-width="32"></circle>
            </svg>
            <span class="text-base hidden dark:block">Light</span>
        </button>
    </div>
    <!-- scroll up button -->
    <div>
        <button
            class="scroll-up w-50px h-50px leading-50px text-center text-primaryColor bg-white hover:text-whiteColor hover:bg-primaryColor rounded-full fixed right-5 bottom-[60px] shadow-scroll-up z-medium text-xl dark:text-whiteColor dark:bg-primaryColor dark:hover:text-whiteColor-dark hidden">
            <i class="icofont-rounded-up"></i>
        </button>
    </div>
    <!--======= Header area start =======-->

    <!-- main body -->
    <main class="bg-transparent">
        <!-- banner section -->
        <section>
            <div class="container-fluid-2">
                <div
                    class="bg-primaryColor p-5 md:p-10 rounded-5 flex justify-center md:justify-between items-center flex-wrap gap-2">
                    <div
                        class="flex items-center flex-wrap justify-center sm:justify-start">
                        <div class="mr-5">
                            <img
                                src="../../assets/images/dashbord/dashbord__2.jpg"
                                alt=""
                                class="w-27 h-27 md:w-22 md:h-22 lg:w-27 lg:h-27 rounded-full p-1 border-2 border-darkdeep7 box-content">
                        </div>
                        <div class="text-whiteColor font-bold text-center sm:text-start">
                            <h5 class="text-xl leading-1.2 mb-5px">Hello</h5>
                            <h2 class="text-2xl leading-1.24">Michle <?php echo htmlspecialchars($user->getUsername())?></h2>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="text-yellow">
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <i class="icofont-star"></i>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-star inline-block">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                            </svg>
                        </div>
                        <p class="text-whiteColor">4.0 (120 Reviews)</p>
                    </div>
                    <div>
                        <a
                            href="create-course.html"
                            class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px border border-whiteColor hover:text-primaryColor hover:bg-whiteColor rounded group text-nowrap flex gap-1 items-center">
                            Create a New Course
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-arrow-right">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--dashbord menu section -->
        <section>
            <div class="container-fluid-2">
                <div
                    class="grid grid-cols-1 lg:grid-cols-12 gap-30px pt-30px pb-100px">
                    <div class="lg:col-start-1 lg:col-span-3">
                        <!-- navigation menu -->
                        <div
                            class="p-30px pt-5 lg:p-5 2xl:p-30px 2xl:pt-5 rounded-lg2 shadow-accordion dark:shadow-accordion-dark bg-whiteColor dark:bg-whiteColor-dark">
                            <!-- greeting -->
                            <h5
                                class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                                WELCOME,<?php echo htmlspecialchars($user->getUsername())?>
                            </h5>
                            <ul>
                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="teacherdash.php"
                                        class="text-primaryColor hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-home">
                                            <path
                                                d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                        </svg>
                                        Dashboard</a>
                                </li>
                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="teachprofile.php"
                                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path
                                                d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        My Profile</a>
                                </li>

                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="teachercourses.php"
                                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-bookmark">
                                            <path
                                                d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                                        </svg>
                                        Courses</a>
                                </li>

                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="teachenrollments.php"
                                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-star">
                                            <polygon
                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                        </svg>
                                        Enrollments</a>
                                </li>

                            </ul>
                            <!-- user -->
                            <h5
                                class="text-sm leading-1 font-semibold uppercase text-contentColor dark:text-contentColor-dark bg-lightGrey5 dark:bg-whiteColor-dark p-10px pb-7px mt-5 mb-10px">
                                USER
                            </h5>
                            <ul>
                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="settings.php"
                                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-settings">
                                            <circle cx="12" cy="12" r="3"></circle>
                                            <path
                                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                                        </svg>
                                        Settings</a>
                                </li>

                                <li
                                    class="py-10px border-b border-borderColor dark:border-borderColor-dark">
                                    <a
                                        href="./../logout.php"
                                        class="text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover:text-primaryColor leading-1.8 flex gap-3 text-nowrap"><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-volume-1">
                                            <polygon
                                                points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                                            <path d="M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                                        </svg>
                                        Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- dashboard content -->
                    <div class="lg:col-start-4 lg:col-span-9">
                        <!-- courses area -->
                        <div
                            class="p-10px md:px-10 md:py-50px mb-30px bg-whiteColor dark:bg-whiteColor-dark shadow-accordion dark:shadow-accordion-dark rounded-5">
                            <!-- heading -->
                            <div
                                class="mb-6 pb-5 border-b-2 border-borderColor dark:border-borderColor-dark">
                                <h2
                                    class="text-2xl font-bold text-blackColor dark:text-blackColor-dark">
                                    Courses
                                </h2>
                            </div>
                            <div class="tab">
                                <div
                                    class="tab-links flex flex-wrap mb-10px lg:mb-50px rounded gap-10px">
                                    <button
                                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap active">
                                        PUBLISH
                                    </button>

                                    <button
                                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                                        PENDING
                                    </button>

                                    <button
                                        class="is-checked relative py-10px px-5 md:py-15px lg:px-10 font-bold uppercase text-sm lg:text-base text-blackColor bg-whiteColor shadow-overview-button dark:bg-whiteColor-dark dark:text-blackColor-dark before:w-0 before:h-0.5 before:absolute before:-bottom-0.5 lg:before:bottom-0 before:left-0 before:bg-primaryColor hover:before:w-full before:transition-all before:duration-300 whitespace-nowrap">
                                        DRAFT
                                    </button>
                                </div>
                                <div class="tab-contents">
                                    <div class="transition-all duration-300">
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                                            <!-- card 2 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_2.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                                        Mechanical
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">29 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">2 hr 10 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Nidnies course to under stand about softwere
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $32.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-greencolor">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_2.jpg"
                                                                            alt="">Rinis Jhon
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card 3 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_3.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor2 rounded font-semibold">
                                                                        Development
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">
                                                                            25 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">
                                                                            1 hr 40 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Minws course to under stand about solution
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $40.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_3.jpg"
                                                                            alt="">Micle John
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card 4 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_4.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-greencolor2 rounded font-semibold">
                                                                        Ui &amp; UX Design
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">
                                                                            36 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">3 hr 40 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Design course to under stand about solution
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $40.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_4.jpg"
                                                                            alt="">
                                                                        <span class="flex flex-shrink-0">Micle Robin</span>
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden transition-all duration-300">
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                                            <!-- card 1 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_1.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                                        Data &amp; Tech
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">23 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">1 hr 30 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Foundation course to under stand about
                                                                softwere
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $32.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_1.jpg"
                                                                            alt="">
                                                                        <span class="flex">Micle john</span>
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card 2 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_2.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                                        Mechanical
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">29 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">2 hr 10 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Nidnies course to under stand about softwere
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $32.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-greencolor">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_2.jpg"
                                                                            alt="">Rinis Jhon
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card 5 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_5.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-orange rounded font-semibold">
                                                                        Data &amp; Tech
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">36 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">3 hr 40 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Data course to under stand about solution
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $40.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_1.jpg"
                                                                            alt="">
                                                                        <span class="flex flex-shrink-0">Micle Robin</span>
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="hidden transition-all duration-300">
                                        <div
                                            class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-30px">
                                            <!-- card 1 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_1.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-secondaryColor rounded font-semibold">
                                                                        Data &amp; Tech
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">23 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">1 hr 30 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Foundation course to under stand about
                                                                softwere
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $32.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-secondaryColor3">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_1.jpg"
                                                                            alt="">
                                                                        <span class="flex">Micle john</span>
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- card 2 -->
                                            <div class="group">
                                                <div class="tab-content-wrapper" data-aos="fade-up">
                                                    <div
                                                        class="p-15px bg-whiteColor shadow-brand dark:bg-darkdeep3-dark dark:shadow-brand-dark">
                                                        <!-- card image -->
                                                        <div class="relative mb-4">
                                                            <a
                                                                href="../../course-details.html"
                                                                class="w-full overflow-hidden rounded">
                                                                <img
                                                                    src="../../assets/images/grid/grid_2.png"
                                                                    alt=""
                                                                    class="w-full transition-all duration-300 group-hover:scale-110">
                                                            </a>
                                                            <div
                                                                class="absolute left-0 top-1 flex justify-between w-full items-center px-2">
                                                                <div>
                                                                    <p
                                                                        class="text-xs text-whiteColor px-4 py-[3px] bg-blue rounded font-semibold">
                                                                        Mechanical
                                                                    </p>
                                                                </div>
                                                                <a
                                                                    class="text-white bg-black bg-opacity-15 rounded hover:bg-primaryColor"
                                                                    href="#"><i
                                                                        class="icofont-heart-alt text-base py-1 px-2"></i></a>
                                                            </div>
                                                        </div>
                                                        <!-- card content -->
                                                        <div>
                                                            <div class="grid grid-cols-2 mb-15px">
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-book-alt pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">29 Lesson</span>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center">
                                                                    <div>
                                                                        <i
                                                                            class="icofont-clock-time pr-5px text-primaryColor text-lg"></i>
                                                                    </div>
                                                                    <div>
                                                                        <span
                                                                            class="text-sm text-black dark:text-blackColor-dark">2 hr 10 min</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <a
                                                                href="../../course-details.html"
                                                                class="text-xl font-semibold text-blackColor mb-10px font-hind dark:text-blackColor-dark hover:text-primaryColor dark:hover:text-primaryColor">
                                                                Nidnies course to under stand about softwere
                                                            </a>
                                                            <!-- price -->
                                                            <div
                                                                class="text-lg font-semibold text-primaryColor font-inter mb-4">
                                                                $32.00
                                                                <del
                                                                    class="text-sm text-lightGrey4 font-semibold">/ $67.00</del>
                                                                <span class="ml-6"><del
                                                                        class="text-base font-semibold text-greencolor">Free</del></span>
                                                            </div>
                                                            <!-- author and rating-->
                                                            <div
                                                                class="grid grid-cols-1 md:grid-cols-2 pt-15px border-t border-borderColor">
                                                                <div>
                                                                    <a
                                                                        href="instructor-details.html"
                                                                        class="text-base font-bold font-hind flex items-center hover:text-primaryColor dark:text-blackColor-dark dark:hover:text-primaryColor"><img
                                                                            class="w-[30px] h-[30px] rounded-full mr-15px"
                                                                            src="../../assets/images/grid/grid_small_2.jpg"
                                                                            alt="">Rinis Jhon
                                                                    </a>
                                                                </div>
                                                                <div class="text-start md:text-end">
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <i
                                                                        class="icofont-star text-size-15 text-yellow"></i>
                                                                    <span class="text-xs text-lightGrey6">(44)</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="../../assets/js/swiper-bundle.min.js"></script>
    <script src="../../assets/js/isotope.pkgd.min.js"></script>
    <script src="../../assets/js/accordion.js"></script>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/count.js"></script>
    <script src="../../assets/js/countdown.js"></script>
    <script src="../../assets/js/counterup.js"></script>
    <script src="../../assets/js/dropdown.js"></script>
    <script src="../../assets/js/filter.js"></script>
    <script src="../../assets/js/mobileMenu.js"></script>
    <script src="../../assets/js/modal.js"></script>
    <script src="../../assets/js/popup.js"></script>
    <script src="../../assets/js/preloader.js"></script>
    <script src="../../assets/js/scrollUp.js"></script>
    <script src="../../assets/js/slider.js"></script>
    <script src="../../assets/js/smoothScroll.js"></script>
    <script src="../../assets/js/stickyHeader.js"></script>
    <script src="../../assets/js/tabs.js"></script>
    <script src="../../assets/js/theme.js"></script>
    <script src="../../assets/js/videoModal.js"></script>
    <script src="../../assets/js/vanilla-tilt.js"></script>
    <script src="../../assets/js/aos.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

<!-- Mirrored from html.themewin.com/edurcok-preview-tailwind/edurock/pages/dashboards/admin-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jan 2025 03:29:09 GMT -->

</html>