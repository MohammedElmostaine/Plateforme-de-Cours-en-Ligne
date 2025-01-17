<?php
require_once "../db/connection.php";
require_once "../classes/user.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.themewin.com/edurcok-preview-tailwind/edurock/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jan 2025 03:16:38 GMT -->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Register | Edurock - Education LMS Template</title>
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
  <?php include ('../layout/HEADER.php'); ?>

  <!-- main body -->
  <main class="bg-transparent">
    <!-- banner section -->
    <section>
      <!-- banner section -->
      <div
        class="bg-lightGrey10 dark:bg-lightGrey10-dark relative z-0 overflow-y-visible py-50px md:py-20 lg:py-100px 2xl:pb-150px 2xl:pt-40.5">
        <!-- animated icons -->
        <div>
          <img
            class="absolute left-0 bottom-0 md:left-[14px] lg:left-[50px] lg:bottom-[21px] 2xl:left-[165px] 2xl:bottom-[60px] animate-move-var z-10"
            src="../assets/images/herobanner/herobanner__1.png"
            alt=""><img
            class="absolute left-0 top-0 lg:left-[50px] lg:top-[100px] animate-spin-slow"
            src="../assets/images/herobanner/herobanner__2.png"
            alt=""><img
            class="absolute right-[30px] top-0 md:right-10 lg:right-[575px] 2xl:top-20 animate-move-var2 opacity-50 hidden md:block"
            src="../assets/images/herobanner/herobanner__3.png"
            alt="">

          <img
            class="absolute right-[30px] top-[212px] md:right-10 md:top-[157px] lg:right-[45px] lg:top-[100px] animate-move-hor"
            src="../assets/images/herobanner/herobanner__5.png"
            alt="">
        </div>
        <div class="container">
          <div class="text-center">
            <h1
              class="text-3xl md:text-size-40 2xl:text-size-55 font-bold text-blackColor dark:text-blackColor-dark mb-7 md:mb-6 pt-3">
              Log In
            </h1>
            <ul class="flex gap-1 justify-center">
              <li>
                <a
                  href="index.html"
                  class="text-lg text-blackColor2 dark:text-blackColor2-dark">Home <i class="icofont-simple-right"></i></a>
              </li>
              <li>
                <span
                  class="text-lg text-blackColor2 dark:text-blackColor2-dark">Log In</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!--form section -->
    <section class="relative">
      <div class="container py-100px">
        <div class="tab md:w-2/3 mx-auto">
          <!-- tab controller -->

          <div
            class="tab-links grid grid-cols-2 gap-11px text-blackColor text-lg lg:text-size-22 font-semibold font-hind mb-43px mt-30px md:mt-0">
            <button
              class="py-9px lg:py-6 hover:text-primaryColor dark:text-whiteColor dark:hover:text-primaryColor bg-white dark:bg-whiteColor-dark dark:hover:bg-whiteColor-dark hover:bg-white relative group/btn shadow-bottom hover:shadow-bottom dark:shadow-standard-dark disabled:cursor-pointer rounded-standard">
              <span
                class="absolute w-full h-1 bg-primaryColor top-0 left-0 group-hover/btn:w-full"></span>

              Login
            </button>
            <button
              class="py-9px lg:py-6 hover:text-primaryColor dark:hover:text-primaryColor dark:text-whiteColor bg-lightGrey7 dark:bg-lightGrey7-dark hover:bg-white dark:hover:bg-whiteColor-dark relative group/btn hover:shadow-bottom dark:shadow-standard-dark disabled:cursor-pointer rounded-standard">
              <span
                class="absolute w-0 h-1 bg-primaryColor top-0 left-0 group-hover/btn:w-full"></span>

              Sing up
            </button>
          </div>

          <!--  tab contents -->
          <div
            class="shadow-container bg-whiteColor dark:bg-whiteColor-dark pt-10px px-5 pb-10 md:p-50px md:pt-30px rounded-5px">
            <div class="tab-contents">
              <!-- login form-->
              <div
                class="block opacity-100 transition-opacity duration-150 ease-linear">
                <!-- heading   -->
                <div class="text-center">
                  <h3
                    class="text-size-32 font-bold text-blackColor dark:text-blackColor-dark mb-2 leading-normal">
                    Login
                  </h3>
                  <p
                    class="text-contentColor dark:text-contentColor-dark mb-15px">
                    Don't have an account yet?
                    <a
                      href="login.php"
                      class="hover:text-primaryColor relative after:absolute after:left-0 after:bottom-0.5 after:w-0 after:h-0.5 after:bg-primaryColor after:transition-all after:duration-300 hover:after:w-full">Sign up for free
                    </a>
                  </p>
                </div>

                <form class="pt-25px" data-aos="fade-up">
                  <div class="mb-25px">
                    <label
                      class="text-contentColor dark:text-contentColor-dark mb-10px block">Username or email</label>
                    <input
                      type="text"
                      placeholder="Your username or email"
                      class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded">
                  </div>

                  <div class="mb-25px">
                    <label
                      class="text-contentColor dark:text-contentColor-dark mb-10px block">Password</label>
                    <input
                      type="password"
                      placeholder="Password"
                      class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded">
                  </div>

                  <div
                    class="text-contentColor dark:text-contentColor-dark flex items-center justify-between">
                    <div class="flex items-center">
                      <input
                        type="checkbox"
                        id="remember"
                        class="w-18px h-18px mr-2 block box-content">
                      <label for="remember"> Remember me</label>
                    </div>
                    <div>
                      <a
                        href="#"
                        class="hover:text-primaryColor relative after:absolute after:left-0 after:bottom-0.5 after:w-0 after:h-0.5 after:bg-primaryColor after:transition-all after:duration-300 hover:after:w-full">Forgot your password?
                      </a>
                    </div>
                  </div>
                  <div class="my-25px text-center">
                    <button
                      type="submit"
                      class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px w-full border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                      Log in
                    </button>
                  </div>
                  <!-- other login -->
                  <div>
                    <p
                      class="text-contentColor dark:text-contentColor-dark text-center relative mb-15px before:w-2/5 before:h-1px before:bg-borderColor4 dark:before:bg-borderColor2-dark before:absolute before:left-0 before:top-4 after:w-2/5 after:h-1px after:bg-borderColor4 dark:after:bg-borderColor2-dark after:absolute after:right-0 after:top-4">
                      or Log-in with
                    </p>
                  </div>
                  <div
                    class="text-center flex gap-x-1 md:gap-x-15px lg:gap-x-25px gap-y-5 items-center justify-center flex-wrap">
                    <button
                      type="submit"
                      class="text-size-15 text-whiteColor bg-primaryColor px-11 py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                      <i class="icofont-facebook"></i> Facebook
                    </button>
                    <button
                      type="submit"
                      class="text-size-15 text-whiteColor bg-primaryColor px-11 py-10px border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                      <i class="icofont-google-plus"></i> Google
                    </button>
                  </div>
                </form>
              </div>
              <!-- sign up form-->
              <div
                class="hidden opacity-0 transition-opacity duration-150 ease-linear">
                <!-- heading   -->
                <div class="text-center">
                  <h3
                    class="text-size-32 font-bold text-blackColor dark:text-blackColor-dark mb-2 leading-normal">
                    Sing Up
                  </h3>
                  <p
                    class="text-contentColor dark:text-contentColor-dark mb-15px">
                    Already have an account?
                    <a
                      href="login.html"
                      class="hover:text-primaryColor relative after:absolute after:left-0 after:bottom-0.5 after:w-0 after:h-0.5 after:bg-primaryColor after:transition-all after:duration-300 hover:after:w-full">Log In</a>
                  </p>
                </div>
                <?php 
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
                      $username = $_POST['username'];
                      $email = $_POST['email'];
                      $password = $_POST['password'];
                      $role = $_POST['role'];

                      $db = (new Database())->connect();
                      $user = new User($db);

                      if ($user->register($username, $email, $password, $role)) {
                          echo "Registration successful!";
                      } else {
                          echo "Registration failed!";
                      }
                  } else {
                      echo "All fields are required!";
                  }
                }
                ?>
                <form class="pt-25px" data-aos="fade-up" method="POST" action="">
                  <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-30px gap-y-25px mb-25px">
                    <div>
                      <label class="text-contentColor dark:text-contentColor-dark mb-10px block">Username</label>
                      <input type="text" name="username" placeholder="Username" class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" required>
                    </div>
                    <div>
                      <label class="text-contentColor dark:text-contentColor-dark mb-10px block">Email</label>
                      <input type="email" name="email" placeholder="Your Email" class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" required>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-30px gap-y-25px mb-25px">
                    <div>
                      <label class="text-contentColor dark:text-contentColor-dark mb-10px block">Password</label>
                      <input type="password" name="password" placeholder="Password" class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" required>
                    </div>
                    <div>
                      <label class="text-contentColor dark:text-contentColor-dark mb-10px block">Role</label>
                      <select name="role" class="w-full h-52px leading-52px pl-5 bg-transparent text-sm focus:outline-none text-contentColor dark:text-contentColor-dark border border-borderColor dark:border-borderColor-dark placeholder:text-placeholder placeholder:opacity-80 font-medium rounded" required>
                      <option value="student">Student</option>
                      <option value="teacher">Teacher</option>
                      </select>
                    </div>
                  </div>
                  <div class="text-contentColor dark:text-contentColor-dark flex items-center">
                    <input type="checkbox" id="accept-pp" class="w-18px h-18px mr-2 block box-content" required>
                    <label for="accept-pp">Accept the Terms and Privacy Policy</label>
                  </div>
                  <div class="mt-25px text-center">
                    <button type="submit" class="text-size-15 text-whiteColor bg-primaryColor px-25px py-10px w-full border border-primaryColor hover:text-primaryColor hover:bg-whiteColor inline-block rounded group dark:hover:text-whiteColor dark:hover:bg-whiteColor-dark">
                      Sign Up
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- animated icons -->
      <div>
        <img
          loading="lazy"
          class="absolute right-[14%] top-[30%] animate-move-var"
          src="../assets/images/education/hero_shape2.png"
          alt="Shape">
        <img
          loading="lazy"
          class="absolute left-[5%] top-1/2 animate-move-hor"
          src="../assets/images/education/hero_shape3.png"
          alt="Shape">
        <img
          loading="lazy"
          class="absolute left-1/2 bottom-[60px] animate-spin-slow"
          src="../assets/images/education/hero_shape4.png"
          alt="Shape">
        <img
          loading="lazy"
          class="absolute left-1/2 top-10 animate-spin-slow"
          src="../assets/images/education/hero_shape5.png"
          alt="Shape">
      </div>
    </section>
  </main>
 
  <?php include ('../layout/FOOTER.php')?>
<!-- Mirrored from html.themewin.com/edurcok-preview-tailwind/edurock/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Jan 2025 03:16:42 GMT -->

</html>