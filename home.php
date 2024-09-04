<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">

   <div class="swiper hero-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <div class="content">
               <h3 style="color: white; margin-bottom:30px;margin-top:10px;">Best Gift Near to you </h3>
               <span>"Order and Send gift to your friends and Family for any occasion or special days through Online"</span>
               <a href="menu.php" class="btn" style="margin-top:30px;">Shop now</a>
            </div>
            <div class="image">
               <img src="images/preview.gif" alt="">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
            <h3 style="color: white; margin-bottom:30px;margin-top:10px;">Best Gift Near to you </h3>
               <span>"Order and Send gift to your friends and Family for any occasion or special days through Online"</span>
               <a href="menu.php" class="btn" style="margin-top:30px;">Shop now</a>
            </div>
            <div class="image">
               <img src="images/hbd1.gif" alt="" width="570" height="427">
            </div>
         </div>

         <div class="swiper-slide slide">
            <div class="content">
               <h3 style="color: white; margin-bottom:30px;margin-top:10px;">Best Gift For Baby And Kids </h3>
               <span>"Order and Send gift to your friends and Family for any occasion or special days through Online"</span>
               <a href="menu.php" class="btn" style="margin-top:30px;">Shop now</a>
            </div>
            <div class="image">
               <img src="images/toy.gif" alt="" width="570" height="427">
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<section class="category">

   <h1 class="title" style="color: orangered;;">Gift category</h1>

   <div class="box-container">


   <a href="category.php?category=package" class="box">
         <img src="images/giftbd1.png" alt="">
         <h3>Gift Packages for BD</h3>
      </a>

      <a href="category.php?category=Flower" class="box">
         <img src="images/flower.png" alt="">
         <h3>Flower</h3>
      </a>

      <a href="category.php?category=Cake" class="box">
         <img src="images/cake.png" alt="">
         <h3>Cake</h3>
      </a>

      <a href="category.php?category=Teady" class="box">
         <img src="images/teady.png" alt="">
         <h3>Teady</h3>
      </a>

      <a href="category.php?category=Toys" class="box">
         <img src="images/toys.png" alt="">
         <h3>Toys</h3>
      </a>

      <a href="category.php?category=Her" class="box">
         <img src="images/Capture.png" alt="">
         <h3>Gifts For Her</h3>
      </a>

     

      <a href="category.php?category=Parents" class="box">
         <img src="images/family.png" alt="">
         <h3>Gifts For Parent's</h3>
      </a>

      <a href="category.php?category=Kids" class="box">
         <img src="images/panda.png" alt="">
         <h3>Kids & Baby</h3>
      </a>

      <a href="category.php?category=Personalize" class="box">
         <img src="images/businessman.png" alt="">
         <h3>Personalized Gifts</h3>
      </a>
      <a href="category.php?category=Handicraft" class="box">
         <img src="images/handicrafts.png" alt="">
         <h3>Handicraft's</h3>
      </a>
      <a href="category.php?category=Wife" class="box">
         <img src="images/love.png" alt="">
         <h3>Gifts For Wife</h3>
      </a>
      <a href="category.php?category=Biscuits" class="box">
         <img src="images/chocolate.png" alt="">
         <h3>Chocolate & Ice cream</h3>
      </a>

   </div>

</section>




<section class="products">

   <h1 class="title">Latest Gift</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 12");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box frm1">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>৳ </span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty frm1" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn frm1">veiw all</a>
   </div>

</section>

<section class="category" style="margin-bottom: 20px;">

   <h1 class="title" style="color: orangered;;">Special Oceasion</h1>

   <div class="box-container">


   <a href="category.php?category=Birthday-Special" class="box">
         <img src="images/birthday-cake.png" alt="">
         <h3>Birthday Presents</h3>
      </a>

      <a href="category.php?category=Valentine-Special" class="box">
         <img src="images/heart.png" alt="">
         <h3>Valentine Special</h3>
      </a>

      <a href="category.php?category=Anniversiry-Special" class="box">
         <img src="images/cake.png" alt="">
         <h3>Anniversiry</h3>
      </a>

      <a href="category.php?category=New-Year" class="box">
         <img src="images/happy-new-year.png" alt="">
         <h3>Happy New Year</h3>
      </a>

   </div>

</section>


<section class="products">

   <h1 class="title">Today's Special</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 9");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box frm1">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>৳ </span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty frm1" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn frm1">veiw all</a>
   </div>

</section>

<section class="category">

   <h1 class="title">Purchase Channel</h1>

   <div class="box-container">

      <a href="#" class="box">
         <img src="images/cash-on-delivery.png" alt="">
         <h3>COD</h3>
         <!-- <p style="font-size:16px;color:red;">Cash On Delivary</p> -->
      </a>

      <a href="#" class="box">
         <img src="images/bkash.svg" alt="">
         <h3>Bkash</h3>
      </a>

      <a href="#" class="box">
         <img src="images/ddbl.png" alt="">
         <h3>DDBL</h3>
         <!-- <p style="font-size:16px;color:red;">Dutch Bangla Banking Ltd.</p> -->
      </a>

      <a href="#" class="box">
         <img src="images/card.png" alt="">
         <h3>CARD</h3>
      </a>

   </div>

</section>


















<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>