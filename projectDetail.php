<?php
$PageID = 3;
include('include/header.php');

$ProjectID = 0;
if(isset($_GET['ProjectID'])){
    $ProjectID = $gblFunc->decrypt($_GET['ProjectID']);
    $ProjectID = (int)$ProjectID;
}

if($ProjectID == 0){
    echo '<script>location = "index.php";</script>';
    die();
}

$Detail = $gblFunc->getProjectDetail($ProjectID);

?>
<style>
    .owl-stage-outer{
        /*height: 500px;*/
    }
    .owl-carousel {
        transform: translateX(60px);
    }
</style>
<div class="offset"></div>
<div class="dark-wrapper container">

    <div class="container inner2">
        <div class="blog row">
            <div class="col-sm-12  blog-content">
                <div class="blog-posts classic-view">

                    <!-- .post -->
                    <div class="post">
                        <div class="box text-center p-top-0"> 
                            <div class="gallery-wrapper main">
                                <div class="basic-slider">
                                    <?php             
                                    $htmlSlide = '';
                                        for($i = 0; $i < count($Detail['Gallery']); $i++){
                                                $Image = 'images/'.$Detail['Gallery'][$i];
                                        
                                        $htmlSlide .= ' <div class="item">
                                                            <img src="'. $Image .'" alt="Studio Basic" />
                                                        </div>';    
                                    
                                            if($i >= 2){
                                                break; 
                                            }
                                        }
                                        
                                        if(count($Detail['Gallery']) < 2){
                                            echo $htmlSlide;
                                            echo $htmlSlide;
                                        }else{
                                            echo $htmlSlide;
                                        }
                                        
                                    ?> 
                                </div>
                                <!-- /.basic-slider --> 
                            </div>
                            <!-- /.gallery-wrapper -->
                            <div class="post-content text-left">
                                <p><?php echo $Detail['Detail']['ProjectDescription']; ?></p>
                            </div>
                            <!-- /.post-content --> 
                        </div>
                        <!-- /.box --> 

                    </div>
                    <!-- /.post -->

                    <div class="post">
                        <div class="box text-center">
                            <div class="category cat5"><span><a href="javascript:;">Gallery</a></span></div>
                            <div class="gallery-wrapper main">
                                <div class="cbp-panel">
                                    <div id="js-grid-mosaic" class="cbp">
                                        <?php                                        
                                            for($i = 0; $i < count($Detail['Gallery']); $i++){
                                                $Image = 'images/'.$Detail['Gallery'][$i]; 
                                        ?>
                                        <div class="cbp-item print">
                                            <a class="cbp-caption fancybox-media" data-rel="portfolio" href="<?php echo $Image; ?>" data-title-id="title-2">
                                                <div class="cbp-caption-defaultWrap">
                                                    <img style="width: 384px; height: 260px;" src="<?php echo $Image; ?>" alt="Studio Basic" /> 
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body">
                                                            <div class="cbp-l-caption-title">
                                                                <span class="cbp-plus"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                            }
                                            
                                            if(count($Detail['Gallery']) <= 0){
                                                echo '<center>No Gallery Image Found!</center>';
                                            }
                                        ?>
                                    </div>
                                </div>
                                <!--/.cbp-panel --> 
                            </div> 
                            <!-- .post-footer --> 
                        </div>
                        <!-- /.box --> 

                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.classic-view -->
 
                <!-- /.grid-view -->
                <div class="row">
                    <div class="col-sm-12"> 
                        <div class="tabs tabs-top left tab-container">
                            <ul class="etabs">
                                <li class="tab"><a href="#tab-1">Facts & Figures</a></li>
                                <li class="tab"><a href="#tab-2">Award</a></li>
                                <li class="tab"><a href="#tab-3">Team</a></li>
                            </ul>
                            <!-- /.etabs -->
                            <div class="panel-container">
                                <div class="tab-block" id="tab-1">   
                                    <div class="col-sm-12">
                                        <div class="col-sm-6">
                                            <ul class="fp-pd-stats__dl-list">
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Appointment</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['Appointment']; ?></span>
                                                </li> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Area</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['Area']; ?></span>
                                                </li> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Client Name</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['ClientName']; ?></span>
                                                </li> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Engineer</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['Engineer']; ?></span>
                                                </li> 
                                            </ul>
                                        </div>
                                        <div class="col-sm-6">
                                            <ul class="fp-pd-stats__dl-list"> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Completion</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['Completion']; ?></span>
                                                </li> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Capacity</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['Capacity']; ?></span>
                                                </li> 
                                                <li class="fp-pd-stats__dl-item">
                                                    <span class="fp-pd-stats__dl-dt">Quantity Surveyor</span>
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Detail']['QuantitySurveyor']; ?></span>
                                                </li> 
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.tab-block -->
                                <div class="tab-block" id="tab-2">
                                    <div class="col-sm-12">
                                        <ul class="fp-pd-stats__dl-list">
                                            <?php
                                            for ($i = 0; $i < count($Detail['Award']); $i++) {
                                                ?>
                                                <li class="fp-pd-stats__dl-item"> 
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Award'][$i]; ?></span>
                                                </li> 
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div> 
                                </div>
                                <!-- /.tab-block -->
                                <div class="tab-block" id="tab-3">
                                    <div class="col-sm-12">
                                        <ul class="fp-pd-stats__dl-list">
                                            <?php
                                            for ($i = 0; $i < count($Detail['Team']); $i++) {
                                                ?>
                                                <li class="fp-pd-stats__dl-item"> 
                                                    <span class="fp-pd-stats__dl-dd"><?php echo $Detail['Team'][$i]; ?></span>
                                                </li> 
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div> 
                                </div>
                                <!-- /.tab-block --> 
                            </div>
                            <!-- /.panel-container --> 
                        </div>
                        <!-- /.tabs --> 
                    </div>

                </div>   

            </div>
            <!-- /.blog-content -->


        </div>
        <!-- /.blog --> 
    </div>
    <!--/.container --> 
</div>
<!--/.dark-wrapper -->
<?php
include('include/footer.php');
?>