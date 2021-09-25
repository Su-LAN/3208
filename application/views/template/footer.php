<?php
 //put your code here 
?>
<footer>
    <div class="container fixed-bottom">
        <div class="row vcenter">
            <div class="col-xs-6">
                <p>&copy; 2021-<?php echo date("Y"); ?></p>
            </div>
        </div>
    </div>

</footer>
</body>
</html>

<script>
 var lasttime;
 
$(document).mousemove(function(event){
    lasttimetmp = new Date();
    lasttime = lasttimetmp.getTime();
    // lasttime = lasttimetmp.getTime();
    sessionStorage.setItem('lasttime', lasttime);

    console.log("I am here");
});
// setInterval(function(){
//     var lasttime = sessionStorage.getItem('lasttime');
//     compare(lasttime);
// },500);
function compare(lasttime){
    var nowtimetmp = new Date();
    var nowtime = nowtimetmp.getTime();
    // console.log(nowtime);
    var lasttime = sessionStorage.getItem('lasttime');
    // console.log(lasttime);
    // console.log(lasttime.getTime());
    var time = nowtime - lasttime;
    
    if(time > 10000){
        console.log("111");
        $.ajax({
            url: "<?php echo base_url();?>index.php/login/auto_logout",
            method:"post",
            data:{},
            success:function(result) {
                console.log("logout");
            },

        });
        
    } else {
        console.log("222");
    }
}  





</script>

