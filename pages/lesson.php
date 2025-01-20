<?php
session_start(); 
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'Admin' ) ) {
    header('Location: Admin/admindashboard.php');
    exit();
  }elseif (isset($_SESSION['role']) && ($_SESSION['role'] == 'Teacher' ) ) {
    header('Location:  dashboard.php');
    exit();
  }

?>

<html lang="en">

<!-- Mirrored from html.themewin.com/edurcok-preview-tailwind/edurock/course-details-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jan 2025 03:28:20 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details 3 | Edurock - Education LMS Template</title>
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="../assets/images/favicon.ico">
    <!-- link stylesheet -->
    <link rel="stylesheet" href="../assets/css/icofont.min.css">
    <link rel="stylesheet" href="../assets/css/popup.css">

    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/video-modal.css">
    <link rel="stylesheet" href="../assets/css/aos.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
            <img src="../assets/images/pre.png" alt="Preloader" class="h-10 w-10 block">
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
    <?php include('../layout/HEADER.php') ?>

    <main class="bg-transparent">
        <!-- lesson section -->
        <section>
            <div class="container-fluid-2 pt-50px pb-100px">
                <div class="grid grid-cols-1 xl:grid-cols-12 gap-30px">
                    <!-- lesson left -->
                    <div class="xl:col-start-1 xl:col-span-4" data-aos="fade-up">
                        <!-- curriculum -->
                        <ul class="accordion-container curriculum">
                            <!-- accordion -->
                            <li class="accordion mb-25px overflow-hidden active">
                                <div
                                    class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-t-md">
                                    <!-- controller -->
                                    <div>
                                        <button
                                            class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                            <span>Lesson #01</span>

                                            <svg
                                                class="transition-all duration-500 rotate-0"
                                                width="20"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 16 16"
                                                fill="#212529">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- content -->
                                    <div class="accordion-content transition-all duration-500">
                                        <div class="content-wrapper p-10px md:px-30px">
                                            <ul>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Intro
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">3.27</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">5.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-course-materials.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Materials
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-audio mr-10px"></i>
                                                            <a
                                                                href="lesson-quiz.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                                Summer Quiz
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-assignment.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mb-25px overflow-hidden">
                                <div
                                    class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                    <!-- controller -->
                                    <div>
                                        <button
                                            class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                            <span>Lesson #02</span>

                                            <svg
                                                class="transition-all duration-500 rotate-0"
                                                width="20"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 16 16"
                                                fill="#212529">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- content -->
                                    <div
                                        class="accordion-content transition-all duration-500 h-0">
                                        <div class="content-wrapper p-10px md:px-30px">
                                            <ul>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Intro
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">3.27</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">5.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">7.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-course-materials.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Materials
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-audio mr-10px"></i>
                                                            <a
                                                                href="lesson-quiz.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                                Summer Quiz
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-assignment.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mb-25px overflow-hidden">
                                <div
                                    class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark">
                                    <!-- controller -->
                                    <div>
                                        <button
                                            class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                            <span>Lesson #03</span>

                                            <svg
                                                class="transition-all duration-500 rotate-0"
                                                width="20"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 16 16"
                                                fill="#212529">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- content -->
                                    <div
                                        class="accordion-content transition-all duration-500 h-0">
                                        <div class="content-wrapper p-10px md:px-30px">
                                            <ul>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Intro
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">3.27</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">5.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">7.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-course-materials.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Materials
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-audio mr-10px"></i>
                                                            <a
                                                                href="lesson-quiz.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                                Summer Quiz
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-assignment.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="accordion mb-25px overflow-hidden">
                                <div
                                    class="bg-whiteColor border border-borderColor dark:bg-whiteColor-dark dark:border-borderColor-dark rounded-b-md">
                                    <!-- controller -->
                                    <div>
                                        <button
                                            class="accordion-controller flex justify-between items-center text-xl text-headingColor font-bold w-full px-5 py-18px dark:text-headingColor-dark font-hind leading-[20px]">
                                            <span>Lesson #04</span>

                                            <svg
                                                class="transition-all duration-500 rotate-0"
                                                width="20"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 16 16"
                                                fill="#212529">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <!-- content -->
                                    <div
                                        class="accordion-content transition-all duration-500 h-0">
                                        <div class="content-wrapper p-10px md:px-30px">
                                            <ul>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Intro
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">3.27</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">5.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>

                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-video-alt mr-10px"></i>
                                                            <a
                                                                href="lesson-2.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Outline
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div
                                                        class="text-blackColor dark:text-blackColor-dark text-sm flex items-center">
                                                        <p class="font-semibold">7.00</p>
                                                        <a
                                                            href="lesson.html"
                                                            class="bg-primaryColor text-whiteColor text-sm ml-5 rounded py-0.5">
                                                            <p class="px-10px">
                                                                <i class="icofont-eye"></i> Preview
                                                            </p>
                                                        </a>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-course-materials.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Course Materials
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap border-b border-borderColor dark:border-borderColor-dark">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-audio mr-10px"></i>
                                                            <a
                                                                href="lesson-quiz.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">
                                                                Summer Quiz
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                                <li
                                                    class="py-4 flex items-center justify-between flex-wrap">
                                                    <div>
                                                        <h4
                                                            class="text-blackColor dark:text-blackColor-dark leading-1 font-light">
                                                            <i class="icofont-file-text mr-10px"></i>
                                                            <a
                                                                href="lesson-assignment.html"
                                                                class="font-medium text-contentColor dark:text-contentColor-dark hover:text-primaryColor dark:hover;text-primaryColor">Assignment
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- lesson right -->
                    <div
                        class="xl:col-start-5 xl:col-span-8 relative"
                        data-aos="fade-up">
                        <div>
                            <div
                                class="absolute top-0 left-0 w-full flex justify-between items-center px-5 py-10px bg-primaryColor leading-1.2 text-whiteColor">
                                <h3 class="sm:text-size-22 font-bold">
                                    Video Content lesson 01
                                </h3>
                                <a href="course-details.html" class="">Close</a>
                            </div>

                            <div class="aspect-[16/9]">
                                <iframe
                                    src="https://www.youtube.com/embed/vHdclsdkp28"
                                    allowfullscreen=""
                                    allow="autoplay"
                                    class="w-full h-full"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <?php include('../layout/FOOTER.php') ?>