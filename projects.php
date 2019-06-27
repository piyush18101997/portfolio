<?php
$PageID = 2;
include('include/header.php');

$Type = 0;
$LocationID = 0;

if (isset($_GET['Type'])) {
    $Type = $gblFunc->decrypt($_GET['Type']);
    $Type = (int) $Type;
}

if (isset($_GET['LocID'])) {
    $LocationID = $gblFunc->decrypt($_GET['LocID']);
    $LocationID = (int) $LocationID;
}
?>

<style>
    .inner2 {
        padding-top: 30px;
        padding-left: 50px;
    }
</style>
<div class="offset"></div>
<div class="light-wrapper container">
    <div class="inner2 bp0" id="project-section">
        <form method="post" class="vanilla vanilla-form" novalidate="novalidate" onsubmit="return false;">              
            <div class="col-sm-12">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-5">
                    <div class="form-field">
                        <label class="custom-select">
                            <select  id="cboProjectType" onchange="xApp.ProjectListURL();xApp.getCboLocation();">
                                <option value="0">Select Project Type</option>
                                <?php
                                    $LocList = $gblFunc->getCboProjectType();
                                    while ($r = $LocList->fetch_assoc()) {
                                        echo '<option value="' . $r['CategoryID'] . '">' . $r['CatergoryName'] . '</option>';
                                    }
                                ?>
                            </select>
                            <span><!-- fake select handler --></span> 
                        </label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-field">
                        <label class="custom-select">
                            <select  id="cboProjectLocation" onchange="xApp.ProjectListURL();">
                                <option value="0">Select Location</option>
                                <?php
                                $LocList = $gblFunc->getCboProjectLocation($Type);
                                while ($r = $LocList->fetch_assoc()) {
                                    echo '<option value="' . $r['LocationID'] . '">' . $r['LocationTitle'] . '</option>';
                                }
                                ?>
                            </select>
                            <span><!-- fake select handler --></span> </label>
                    </div>
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </form>
        <!-- /.thin --> 
    </div>
    <!-- /.container -->
    <div class="divide30"></div>
    <div class="cbp-panel"> 
        <div id="dvProgressEmailStatus" style="text-align:center;display: none; padding: 10px 0; width: 100%;" >
            <img src="images/loader.gif" />
        </div>
        <div id="js-grid-full-width" class="cbp">

            <?php
            $cnt = 0;
            $List = $gblFunc->getProjectLists($Type, $LocationID);
            while ($rs = $List->fetch_assoc()) {
                $cnt++;
                $Image = 'http://themes.iki-bir.com/lydia/style/images/art/p2.jpg';
                if ($rs['Image'] != '') {
                        $Image = 'images/'.$rs['Image'];
                }

                $ProjectID = $gblFunc->encrypt($rs['ProjectID']);
                ?>
                <div class="cbp-item print motion"> 
                    <a href="projectDetail.php?ProjectID=<?php echo $ProjectID; ?>" class="cbp-caption">
                        <div class="cbp-caption-defaultWrap"> 
                            <img style="width:475px;height:323px;" src="<?php echo $Image; ?>" alt="<?php echo $rs['ProjectTitle']; ?>" /> 
                            <span class="text-block"><?php echo $rs['ProjectTitle']; ?></span>
                        </div>
                    </a> 
                </div>
                <?php
            }
            ?>

            <!--/.cbp-item -->

        </div>
        <?php
            
            if($cnt == 0){
                echo '   <div style="height:500px;">
                            <center>Sorry,No Project Found!</center>  
                        </div>   ';
            }
        ?>
        <!--/.cbp --> 

    </div>
    <!--/.cbp-panel --> 

</div>
<!-- /.light-wrapper -->
<?php
include('include/footer.php'); 
?>
<script type="text/javascript" src="jsapp/contactus.js?t=<?=time()?>"></script>
<script>
    $j(document).ready(function () {

        Type = '<?php echo $Type; ?>';
        LocationID = '<?php echo $LocationID; ?>';

        $j('#cboProjectType').val(Type);
        $j('#cboProjectLocation').val(LocationID);
         
    });
    
    
</script>