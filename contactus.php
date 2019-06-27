<?php
$PageID = 5;
include('include/header.php');
?>


<div class="offset"></div>
<div class="light-wrapper container-fluid">
        <h3 class="section-title text-center contact-section">Contact Us</h3>
    <div class="container-fluid inner">
        <div class="innner-text">Tell us about your project ideas or just say hello. Whether you've got a big idea or need some inspiration with a building project.<br> We are here for you. If you would like to reach us for any reason, use the handy contact form below.<br> We try  to respond within 24 to 48 hours. <span class="text-color-red" style="color: #ea871c">Thanks and have a great day!</span>
        </div>
        <div class="thin row">
            <div class="form-container-fluid col-sm-6">
            <div class="divide50"></div>
                <form action="#" id="frmContact" method="post" onsubmit="return false;" class="vanilla-form" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-12 formA1" id="form-name">
                            <div class="form-field">
                                <label>NAME
                                    <input id="txtContName" type="text" name="name">
                                </label>
                            </div>
                            <!--/.form-field --> 
                        </div>
                        <!--/column -->
                        <div class="col-sm-12 formA1" id="form-email">
                            <div class="form-field">
                                <label>EMAIL
                                    <input type="text" id="txtContEmail" name="email">
                                </label>
                            </div>
                            <!--/.form-field --> 
                        </div>
                        <!--/column -->
                        <div class="col-sm-6 formA1" id="form-project_type">
                            <div class="form-field">
                                <label>PROJECT TYPE
                                    <select class="project-type" id="projectname">
                                        <datalist id="projectname">
                                        <option value="0"> Architecture planning </option>
                                        <option value="1"> Custom Homes</option>
                                        <option value="2"> Remodel or addition</option>
                                        <option value="3"> Commercial</option>
                                        <option value="4"> Interior Design</option>
                                        <option value="5"> Kitchen or wardrobe</option>
                                        <option value="6"> Others</option>
                                    </select>
                                </label>
                            </div>
                            <!--/.form-field --> 
                        </div>
                        <!--/column -->
                        <div class="col-sm-6 formA1" id="form-project_budgrt">
                            <div class="form-field">
                                <label>PROJECT BUDGET
                                    <select class="form-control1" id="project-budget">
                                        <option value="0">2Lakh</option>
                                        <option value="1">4Lakh</option>
                                        <option value="2">6Lakh</option>
                                        <option value="3">8Lakh</option>
                                        <option value="4">10Lak</option>
                                        <option value="5">20Lak</option>
                                    </select>
                                </label>
                            </div>
                            <!--/.form-field --> 
                        </div>
                        <!--/column --> 
                        <div class="col-sm-12 formA1" id="form-project_Address">
                            <div class="form-field">
                                <label>PROJECT ADDRESS
                                    <input type="text" id="txtAddress" name="Subject">
                                </label>
                            </div>
                            <!--/.form-field --> 
                        </div>
                    
                        <div class="col-sm-12 formA1" id="form-message">
                            <div class="form-field">
                                <label>MESSAGE
                                    <textarea id="txtMessage" rows="4" style="resize: none;" name="message"  ></textarea>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--/.row -->
                    <!--/.radio-set -->
                    <section class="submit_btn">
                        <button type="submit" onclick="xApp.ContactUs();" class="btn post-btn" value="Submit" data-error="Fix errors" data-processing="Sending..." data-success="Thank you!">
                        Submit message</button>
                    </section>
                    <footer class="notification-box"></footer>
                </form>
                <!--/.vanilla-form --> 
            </div>
            <div class="map-marker map-marker-section col-sm-6">
                <div class="divide50"></div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.118076847243!2d77.2988173150831!3d28.656182982408488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfb294364307f%3A0xb07225e352958e5a!2sStudio+Basic!5e0!3m2!1sen!2sin!4v1556538832311!5m2!1sen!2sin" width="100%" height="380" frameborder="0" style="border:0; margin-top: 20px; " allowfullscreen></iframe>
         
                <ul class="contact-info text-center">

                    <!-- <li> -->
                        <i class="fa fa-map-marker"></i> ss-6, 2nd Floor, Aditya Mega Mall,<br>CBD Ground Near Karkardooma Court, <br>New Delhi, Delhi 110032<br>  
                    <!-- </li> -->
                    <!-- <li> -->
                        <i class="fa fa-phone"></i>
                        <span class="text-color-red"style="color: #ea871c">+91-8506913225<br>+91-9315668342</span><br>
                    <!-- </li> -->
                    <li id="contact-email">
                        <i class="fa fa-envelope" ></i><a href="studiobasic@email.com">info@studiobasic.co.in</a> 
                    </li>
                </ul>
            </div>
             
            <!--/.form-container --> 
        </div>
        <!-- /.thin --> 
    </div>
    <!-- /.container --> 
</div>
<!-- /.light-wrapper -->
<?php
include('include/footer.php');
?>

<script type="text/javascript" src="jsapp/contactus.js?t=<?=time()?>"></script>