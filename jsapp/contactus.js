$j.extend(xApp, {

    ContactUs:function(){
        
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        
        Name    = $j('#txtContName').val();
        Mobile  = $j('#txtContMobile').val();
        Email   = $j('#txtContEmail').val();
        Subject = $j('#txtSubject').val();
        Message = $j('#txtMessage').val();
        
        flag = 0;
        error = '';
        
        if(Name == ''){
            $j('#txtContName').addClass('error');
            flag = 1;
            error = glblRequiredFeild;
        }else{
            $j('#txtContName').removeClass('error');
        }
        
        if(Subject == ''){
            $j('#txtSubject').addClass('error');
            flag = 1;
            error = glblRequiredFeild;
        }else{
            $j('#txtSubject').removeClass('error');
        }
        
        if(Mobile == ''){
            $j('#txtContMobile').addClass('error');
            flag = 1;
            error = glblRequiredFeild;
        }else if(Mobile.length!=10){
            $j('#txtContMobile').addClass('error');
            flag = 1;
            error = gblInvalidMobile;
        }else if(isNaN(Mobile)){
            $j('#txtContMobile').addClass('error');
            flag = 1;
            error = gblInvalidMobile;
        }else{
            $j('#txtContMobile').removeClass('error');
        }
        
        if(Message == ''){
            $j('#txtMessage').addClass('error');
            flag = 1;
            error = glblRequiredFeild;
        }else{
            $j('#txtMessage').removeClass('error');
        }
        if(Email == ''){
            $j('#txtContEmail').addClass("error");
            flag = 1;
            error = glblRequiredFeild;
        }else if(!filter.test(Email)){
            $j('#txtContEmail').addClass("error");
            flag = 1;
            error = gblInvalidEmail;
        }else{
            $j('#txtContEmail').removeClass('error');
        }
        
        if(flag == 1){
            $j('.notification-box').addClass('show-error');
            $j('.notification-box').html(error);
            return;
        }
        
        $j('#imgLoader').show();
        $j('#btnSend').hide();
        
        
        
        $j.ajax({
            type:"GET", 
            url:"ws/wsContactUs.php",
            dataType: 'json',
            cache: false,           
            data:{
                'json':$j.toJSON( {
                    "action"    : "ContactUs",
                    "Subject"   : Subject,
                    "Name"      : Name,
                    "Mobile"    : Mobile,
                    "Email"     : Email,
                    "Message"   : Message
                })
            },
            success: function(json){
                if(json.status){                    
                    $j('#imgLoader').hide();
                    $j('#btnSend').show();
                    $j('.notification-box').addClass('show-success');
                    $j('.notification-box').html('Message send successfully, we will get back to you soon!');
                    
                    document.getElementById('frmContact').reset();
                }
            },
            error: function(){
                $j('#imgLoader').hide();
                $j('#btnSend').show();

                $j('.notification-box').addClass('show-error');
                $j('.notification-box').html('Try Again!');
            }
        });
        
    },
    
    ProjectListURL:function(){
        
        TypeID      = $j('#cboProjectType').val();
        LocationID  = $j('#cboProjectLocation').val();
        
        $j('#dvProgressEmailStatus').show(); 
        
        $j.ajax({
            type:"GET", 
            url:"ws/wsContactUs.php",
            dataType: 'json',
            cache: false,           
            data:{
                'json':$j.toJSON( {
                    "action"        : "ProjectListURL",
                    "TypeID"        : TypeID,
                    "LocationID"    : LocationID
                })
            },
            success: function(json){
                if(json.status){                    
                    
                    $j('#dvProgressEmailStatus').hide();
                    window.location.href = "projects.php?Type="+json.data.TypeID+"&LocID="+json.data.LocationID;
                }
            },
            error: function(){
                
                
            }
        });
        
    }
    
});