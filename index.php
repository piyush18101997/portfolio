<?php
$PageID = 1;
include('include/header.php');
?>
<style>
    .cbp .cbp-item {
        padding: 25px;
    } 
</style>
<div class="tp-fullscreen-container revolution">
    <div class="row" id="tp-banner-slider">
        <div class="col-md-3 col-lg-3" id="banner-intro">
            <img id="text-img" width="200" height="100" src="images/text-img.jpeg" alt="img"> 
            <section class="section1"></section>
            <h4 id="scroll-images-sidetext">" Designs that embraces<br>elegance, timelessness <br>simplicity, reality and <br> the nature above all. "</h4>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-9" style="position: relative; margin-top: -88px; padding-right:unset!important;">
            <div class="tp-fullscreen">
                <ul class="tp-fullscreen-img">
                    <?php
                        $Slist = $gblFunc->getHomeSliderImage();
                        while($rs = $Slist->fetch_assoc()){
                            $Image = 'http://themes.iki-bir.com/lydia/style/images/art/slider-bg1.jpg';
                            if ($rs['SliderImage'] != '') {
                                    $Image = 'images/'.$rs['SliderImage']; 
                            }
                    ?>
                        <li data-transition="fade"> 
                            <img src="<?php echo $Image; ?>"  alt="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" />
                            <h1 class="tp-caption medium sfr" data-x="left" data-y="663" data-speed="900" data-start="2800" data-easing="Sine.easeOut">
                                    <?php echo $rs['SliderTitle']; ?>
                            </h1>
                        </li>
                    <?php
                        }
                    ?> 
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    <!-- /.tp-fullscreen-container --> 
    </div>
</div>
<!-- /.revolution -->

<div class="">
    <div class="container inner dark-wrapper">
        <!-- /.thin -->
        <div class="divide10"></div>
        <div class="">
            <div id="side-tiles" class="">
                
                <?php
                    $ProList = $gblFunc->getHomePageProject();
                    $i = 1;
                    $j = 0;
                    $k = 0;
                    $class = '';
                    $html = '';
                    $array = array("print motion", "print", "web logo", "web", "print logo", "print web", "motion logo","logo web");
                    while($r = $ProList->fetch_assoc()){

                        $class =  $array[array_rand($array, 1)];

                        $Image = 'http://themes.iki-bir.com/lydia/style/images/art/p2.jpg';
                        if($r['Image'] != ''){
                            $Image = 'images/'.$r['Image'];
                        }
                        
                        $ProjectID = $gblFunc->encrypt($r['ProjectID']);
                        
                        if($k > 1){
                            $k = 0;
                        }
                        
                        
                        if($k == 1){
                            $html1 = ' <div class="col-md-offset-6 col-md-5 m-top-10 col-sm-12 col-xs-12 text-margin"> ';
                            $imgStyle = 'style="width:670px;height:307px;"';
                        }else if($k == 0){
                            $html1 = '<div class="col-md-6 col-md-offset-1 no-pad col-sm-12 col-xs-12">';
                            $imgStyle = 'style="width:553px;height:333px;"';
                        }else{
                            $html1 = '';
                            $imgStyle = '';
                        }
                        
                        if($j == 1){
                            $html .= '</div>';
                            $j = 0;
                        } 
                        if($j == 0){
                            $html .= '<div class="row">';
                        }
                         
                        
                        $html .= $html1;
                        
                        $html .= '  
                                    
                                        <div class="img-block">
                                        <img src="'.$Image.'" '.$imgStyle.' class="img-responsive" alt="'.$r['ProjectTitle'].'">
                                            <p class="img-text">'.$r['ProjectTitle'].'
                                                <a href="projectDetail.php?ProjectID='.$ProjectID.'">Read more...</a>
                                            </p>
                                        </div>
                                    </div>';
              
                       $i++; 
                       $j++;
                       $k++;
                    } 
                    echo $html;
                ?> 

            </div>
            <!--/.cbp --> 

        </div>
        <!--/.cbp-panel -->
        <div class="divide30"></div>
    </div>
    <!-- /.container --> 
</div>
<!-- /.dark-wrapper -->

 
<?php
include('include/footer.php');
?>