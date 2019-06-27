<footer class="footer inverse-wrapper">
     
    <!-- .container -->

    <div class="sub-footer">
        <div class="container inner">
            <p class="text-center">© 2019 Studio Basic. All rights reserved.</p>
        </div>
        <!-- .container --> 
    </div>
    <!-- .sub-footer --> 
</footer>
<!-- /footer --> 


<!--/.body-wrapper --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/plugins.js"></script> 
<script src="js/classie.js"></script> 
<script src="js/jquery.themepunch.tools.min.js"></script> 
<script src="js/scripts.js"></script>


<script type="text/javascript" src="js/json.js?t=<?=time()?>"></script>
<script type="text/javascript" src="js/glblError.js?t=<?=time()?>"></script>
<script type="text/javascript">
    var $j = jQuery.noConflict();
    var $ = jQuery.noConflict();
    var xApp = {};
    
    $j(document).ready(function(){
        PageID = '<?php echo $PageID; ?>';
        
        $j('#liPage_1').removeClass('current');
        $j('#liPage_2').removeClass('current');
        $j('#liPage_3').removeClass('current');
        $j('#liPage_4').removeClass('current');
        
        $j('#liPage_'+PageID).addClass('current');
    });
</script>
</body>
</html>