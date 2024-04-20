
<?php
    require('admin/include/db.php');
    require('admin/include/essentials.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="Script/nav.js"></script>
</head>
<body>
<header id="home">
        <a href="" class=logo><i class="ri-roadster-fill"></i>Car Rental</a>
        <ul class="nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="addtocart.php">Book</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="sign">
            <a href="logout.php"><button>Log Out</button></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

</header>
<?php 
    $contact_q="SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $value=[1];
    $contact_r=mysqli_fetch_assoc(select($contact_q,$value,'i'));
?>

<section>
    <div class="contact-section">
        <div class="contact-section-title">
            <div class="contact-section-title-heading">
                <h2>Contact Us</h2>
            </div>
            <div class="contact-section-title-text">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere magnam architecto laborum nisi totam cum, velit, mollitia <br> repellendus maiores consequatur ullam impedit deleniti. Illo perferendis nam inventore doloremque cum. Molestias.</p>
            </div>
        </div>
    </div>
    <div class="contact-section-card-container">
        <div class="contact-section-card">
            <div class="contact-section-left-card">
                <div class="contact-section-left-card-description">
                    <div class="contact-section-left-card-map">
                        <iframe src="<?php echo $contact_r['iframe']?>" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="contact-section-left-card-context">
                        <div class="contact-section-left-card-context-details">
                            <h5>Address</h5>
                            <p><i class='bx bxs-location-plus'></i><a href="https://maps.app.goo.gl/mfDkFUMecKJakiKG9" target="_blank"><?php echo $contact_r['address']?></a> </p>
                        </div>
                        <div class="contact-section-left-card-context-details">
                            <h5>Contact</h5>
                            <p><i class='bx bxs-phone'></i><a href="<?php echo $contact_r['pn1']?>">+<?php echo $contact_r['pn1']?></a> </p>

                            <?php 
                            
                                if($contact_r['pn2']!=''){
                                    echo<<< html
                                        <p>
                                            <i class='bx bxs-phone'></i>
                                            <a href="{$contact_r['pn2']}">+{$contact_r['pn2']}</a> 
                                        </p>
                                    html;
                                }
                            
                            ?>
                        </div>
                        <div class="contact-section-left-card-context-details">
                            <h5>Email</h5>
                            <p><i class='bx bxs-envelope'></i><a href="#"><?php echo $contact_r['email']?></a> </p>
                        </div>
                        <div class="contact-section-left-card-context-details">
                            <h5>Follow Us</h5>
                            
                            <p>
                                <?php 
                                    
                                if($contact_r['insta']!=''){
                                    echo<<< html
                                    <a href="{$contact_r['insta']}" target="_blank"><i class='bx bxl-instagram-alt'></i></a> 
                                    html;
                                }
                                if($contact_r['fb']!=''){
                                    echo<<< html
                                    <a href="{$contact_r['fb']}"  target="_blank"><i class='bx bxl-facebook-square'></i></a> 
                                    html;
                                }
                                if($contact_r['linkedin']!=''){
                                    echo<<< html
                                    <a href="{$contact_r['linkedin']}" target="_blank"><i class='bx bxl-linkedin-square'></i></a>
                                    html;
                                }
                                ?> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-section-right-card">
                <div class="contact-section-right-card-form">
                    <form>
                        <div class="form-title">
                            <h3>Send a message</h3>
                        </div>
                        <div>
                            <label>Name</label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label>Subject</label>
                            <input type="text" name="name">
                        </div>
                        <div>
                            <label>Messages</label>
                            <textarea name="message"  cols="30" rows="10"></textarea>
                        </div>
                        <div>
                            <button>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('include/footer.php')?>
</body>
</html>

