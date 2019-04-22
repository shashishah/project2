 
        <!-- Site Title -->
        
     

      
        
  
        </head>
        <style type="text/css">
        
        .left-contents .jq-tab-menu .jq-tab-title {
    
    font-size: 15px;
   
}

      


             /* header part*/

           
             .our_services
             {

                margin-top: -31px; 
                   font-size: 20px;
                   font-weight: 600;
             }

.product_img
{

     margin-left: -19%;
      margin-top: -20%;
}

.online_train
{
    margin-top: -180px;
}

.online_img
{
    width: 350px;
    height: 250px
}

  .our_services
             {

                margin-top: -31px; 
                   font-size: 20px;
                   font-weight: 600;
             }

             .cop_img
             {
                margin-left: -10%;
                margin-top: -5%;
                width: 400px;
                height: 300px;
             }

             .salesforce_tutorial
             {
                    width: 263px;
    height: 190px;
             }
             /*header part end*/
            
 @media only screen and (max-width: 450px) {

                    /*header part start*/
   .mylogo
            {
                    width: 117px;
                    margin-left: 0px !important;
                
            }

            #header #logo img {
    max-height: 40px;
    margin-left: -66px;
}
            .blin_mob {
   font-size: 13px;
        width: 67px;
   
}

       .blin_mob1 {
   font-size: 13px;
    width: 114px;
   margin-left: -163%;
}

.nav-menu ul {
    margin: 24px 0 0 0;
    padding: 10px;
       box-shadow: rgba(127, 137, 161, 0.25) 0px 0px 30px;
    background: rgba(0, 0, 0, 0.64) !important;
}

 .header-top
            {

                 height: 83px;
                  background: #f98f17;
            }
               .social_mob
            {
                font-size: 2em; 

            }
               .head_left
             {
                    background: #f98f17;
    height: 48px;
       margin-left: -134px;

             }

             div.b {
    width: 52px;
    height: 0px;
    background-color: white;
    -ms-transform: skewY(20deg);
    -webkit-transform: skewY(20deg);
    transform: skewY(34deg);
    margin-top: 31px;
    color: #ffffff;
    display: none;
}
.phone_mob
{
    
        color: #f98f17;

}
.social_type
{
        margin-left: -35px;
            margin-top: 50%;
}
.email  {
   color: #f98f17;
}

    .course_menu
    {
        margin: -12px -109px 35px 43px;
    /* padding: 0%; */
    box-shadow: rgba(127, 137, 161, 0.25) 0px 0px 30px;
    background: rgba(0, 0, 0, 0.64);
    width: 225px;
    height: 267px;
    color: rgb(255, 255, 255);
    display: block;
    }


li > a >h1 {
    font-size: 12px !important;
    padding: 0 1px 0px -4px;
    text-decoration: none;
    display: inline-block;
    color: white;
    font-weight: 500;
    font-size: 13px;
    text-transform: uppercase;
    outline: none;
    font-weight: 600;
    line-height: 13px;
    margin-top: -18px;
}
.nav-menu ul {
    margin: 24px 0 0 0;
    padding: 10px;
       box-shadow: rgba(127, 137, 161, 0.25) 0px 0px 30px;
    background: rgba(0, 0, 0, 0.64)
}


.header-top ul li {
    display: inline-block;
    margin-left: -8px;
}

.our_services
{

        margin-top: 27px;
    font-size: 30px;
    font-weight: 600;
}


.about-content h1 {
    font-size: 35px;
    font-weight: 600;
}

.post-content-area .single-post .meta-details {
    margin-top: -108px;
}

.social_type {
    margin-left: -35px;
    margin-top: 50%;
}
.header-top
            {

                     height: 60px;
                  background: #f98f17;
            }

}


@media only screen and (min-width: 451px) 
{
#social_icons
{
margin-left: 0% !important;
}

.header-top-left > a > span 
{
color: #014783b3;
}
.lnr
{
padding: 3px;
}
}

@media only screen and (max-width: 450px) 
{

.email 
{
color: white;
}
.phone_mob 
{
color: white;
}
.our_services {
    margin-top: -128px !important;
}
}


</style>


        <body>  
           <!-- header start-->
              <!-- header start-->
            <!-- #header -->

            <!-- start banner Area -->
            <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home" >  
                <div class="overlay overlay-bg" style="       background-color: rgba(4, 9, 30, 0.06);"></div>
                <div class="container">             
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white our_services">
                                Blog                
                            </h1>   
                            <p class="text-white link-nav"><a href="<?= base_url(); ?>">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="<?= base_url(); ?>blog"> Blog</a></p>
                        </div>  
                    </div>
                </div>
            </section>
            <!-- End banner Area -->                  

            <!-- Start top-category-widget Area -->
       
            <!-- End top-category-widget Area -->
            
            <!-- Start post-content Area -->
                                        <?php 

             foreach ($blog_list->result() as $row)  
         {  
           ?>   
            <section class="post-content-area" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 posts-list">


                            <div class="single-post row">
                                <div class="col-lg-3  col-md-3 meta-details" style="    margin-top: 15px;">
                                    <img src="<?php echo $row->blog_image;?>" alt="<?php echo $row->alt_tag;?>" style="width: 263px;height: 190px">
                                
                                </div>
                                <div class="col-lg-9 col-md-9 ">
                                 
                                    <a class="posts-title" href="<?php echo $row->blog_url;?>"><h3 style="    margin: 10px 0px;
    font-size: 20px;"><?php echo $row->blog_name;?></h3></a>
                                    <p class="excert" style="text-align: justify;font-size:16px">
                                       <?php echo $row->blog_content;?>



                                    </p>
                                    <a href="<?php echo $row->blog_url;?>" class="primary-btn" style="    background: #f7631b !important;
    color: #fff !important;">Read More</a>
                                </div>
                            </div>
                            
                        
                        
                        
                        </div>




                    
                    </div>
                </div>  
            </section>

                             <?php 
     }  
         ?>

            <!-- End post-content Area -->


             <!-- Start post-content Area -->
       <!--      <section class="post-content-area" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 posts-list"> 
                            <div class="single-post row">
                                <div class="col-lg-3  col-md-3 meta-details" style="    margin-top: 15px;">
                                    <img src="<?= base_url(); ?>assets/img/salesforce_tutorial.jpg" class="salesforce_tutorial">
                                
                                </div> 
                                <div class="col-lg-9 col-md-9 ">
                                 
                                 <a class="posts-title" href="<?= base_url(); ?>blog/salesforce-tutorial"><h3 style="    margin: 10px 0px;
    font-size: 20px;">Salesforce Tutorial - A Brief View for Beginners</h3></a>
                                    <p class="excert" style="text-align: justify;">
                                       IT market trends have been boosting in this generation through a new-yet-successful platform, Salesforce.  Lots of job opportunities are available for those who are certified in Salesforce.  Salesforce training in Hyderabad is available at many institutes among which Capital Info solutions is the best. Lucky to reach this page! Have a look on this article if you are a beginner planning a career in Salesforce.


                                    </p>
                                    <a href="<?= base_url(); ?>blog/salesforce-tutorial" class="primary-btn" style="    background: #f7631b !important;
    color: #fff !important;">Read More</a>
                                </div>







                            </div>
                            
                        
                        
                        
                        </div>




                    
                    </div>
                </div>  
            </section> -->

<!-- 
              <section class="post-content-area" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 posts-list"> 
                            <div class="single-post row">
                              
<div class="col-lg-3  col-md-3 meta-details" style="    margin-top: 15px;">
                                    <img src="<?= base_url(); ?>assets/img/what_img.png" alt="cloud computing" style="    width: 270px;">
                                
                                </div> 


                                <div class="col-lg-9 col-md-9 ">
                                 
                                 <a class="posts-title" href="<?= base_url(); ?>blog/what-is-cloud-computing"><h3 style="    margin: 10px 0px;
    font-size: 20px;">Cloud Computing - What it is and How it works?</h3></a>
                                    <p class="excert" style="text-align: justify;">
                                        Internet has become the fantastic gift for enterprises. As you know, businesses working online have become common these days. Also, along with this, the development and maintenance of businesses are done online. Specific companies are involved in providing infrastructure and software such approach working through internet and intended for improving business services to various enterprises throughout the world with the help of Internet. Cloud computing is one efficiency. 


                                    </p>

                                        <a href="<?= base_url(); ?>blog/what-is-cloud-computing" class="primary-btn" style="    background: #f7631b !important;
    color: #fff !important;">Read More</a>
                                </div>
                                   
                                </div>






                                







                    
                    </div>
                </div>  
            </section>
             -->
           <!--    <section class="post-content-area" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 posts-list"> 
                            <div class="single-post row">
                              
<div class="col-lg-3  col-md-3 meta-details" style="    margin-top: 15px;">
                                    <img src="<?= base_url(); ?>assets/img/what_is_devops.png" alt="cloud computing" style="    width: 270px;">
                                
                                </div> 


                                <div class="col-lg-9 col-md-9 ">
                                 
                                 <a class="posts-title" href="<?= base_url(); ?>blog/what-is-devops"><h3 style="    margin: 10px 0px;
    font-size: 20px;">What is DevOps? Perfect Guide to Beginners</h3></a>
                                    <p class="excert" style="text-align: justify;">
                                        Present generation enterprises inculcate sophisticated applications utilizing different technologies, various databases, and different types of end-user devices. In order to cope up with these divergent environments successfully, it has become essential for them to develop and maintain a platform. The result fruit is DevOps.


                                    </p>

                                        <a href="<?= base_url(); ?>blog/what-is-devops" class="primary-btn" style="    background: #f7631b !important;
    color: #fff !important;">Read More</a>
                                </div>


                                
                                   
                                </div>
                              </div>
                </div>  
            </section> -->
            <!-- End post-content Area -->
            
   <!---foter part-------->
<style>
.section-gap {
    padding: 15px 0;
}
</style>
      <!-- End footer Area -->  
<script src="<?= base_url(); ?>assets/js/vendor/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="<?= base_url(); ?>assets/js/vendor/bootstrap.min.js"></script>     
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="<?= base_url(); ?>assets/js/easing.min.js"></script>     
      <script src="<?= base_url(); ?>assets/js/hoverIntent.js"></script>
      <script src="<?= base_url(); ?>assets/js/superfish.min.js"></script>  
      <script src="<?= base_url(); ?>assets/js/jquery.ajaxchimp.min.js"></script>
      <script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>  
        <script src="<?= base_url(); ?>assets/js/jquery.tabs.min.js"></script>            
      <script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script> 
      <script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>                 
      <script src="<?= base_url(); ?>assets/js/mail-script.js"></script>  
      <script src="<?= base_url(); ?>assets/js/main.js"></script> 
    </body>
  </html>