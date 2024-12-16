<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>Explore a wide range of courses designed to help you succeed. Whether you're looking to master new skills, advance your career, or explore a new field, we offer courses tailored to your needs. Start your learning journey today!</p>
         <a href="courses.html" class="inline-btn">our courses</a>
      </div>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>+1k</h3>
            <span>online courses</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div>
            <h3>+25k</h3>
            <span>brilliants students</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div>
            <h3>+5k</h3>
            <span>expert teachers</span>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-briefcase"></i>
         <div>
            <h3>100%</h3>
            <span>job placement</span>
         </div>
      </div>

   </div>

</section>

<!-- about section ends -->

<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="heading">From the StudyHub community</h1>

   <div class="box-container">


   



      <div class="box">
         <p>The courses here helped me develop new skills that I was able to apply right away in my job. The content is comprehensive, easy to understand, and well-structured. I would highly recommend this platform to anyone looking to enhance their career.</p>
         <div class="user">
            <img src="images/pic-2.jpg" alt="">
            <div>
               <h3>nikita kapse</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I had a fantastic experience with the online courses! The instructors are top-notch and the support team is always there to help. I feel much more confident in my skills, and I've already seen improvements in my work performance.</p>
         <div class="user">
            <img src="images/pic-3.jpg" alt="">
            <div>
               <h3>sejal kakade</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>I was looking for a course to help me transition into a new career, and I found the perfect fit here. The instructors really took the time to explain concepts and answer questions. I feel much more confident and ready to start my new job!</p>
         <div class="user">
            <img src="images/pic-4.jpg" alt="">
            <div>
               <h3>shravani mohite</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p> I joined this platform to improve my coding skills, and I can honestly say it was one of the best decisions I've made. The learning modules are structured well, and I was able to progress at my own pace. Highly recommended for anyone looking to learn new technical skills! </p>
         <div class="user">
            <img src="images/pic-5.jpg" alt="">
            <div>
               <h3>srushti garad</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
               </div>
            </div>
         </div>
      </div>

      
      <div class="box">
         <p>The platform exceeded my expectations. I’ve taken several courses here, and each one has been better than the last. The interactive lessons and hands-on projects are incredibly helpful for building real-world skills. I now feel prepared for new job opportunities in my field!</p>
         <div class="user">
            <img src="images/pic-6.jpg" alt="">
            <div>
               <h3>deepika roy</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

      <div class="box">
         <p>What I loved most about this platform was the flexibility to learn at my own pace. The course materials are rich and detailed, and the instructors are incredibly responsive. It was the perfect fit for someone like me with a busy schedule!</p>
         <div class="user">
            <img src="images/pic-7.jpg" alt="">
            <div>
               <h3>vedika patil</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
      </div>

   </div>

</section>

<!-- reviews section ends -->










<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>