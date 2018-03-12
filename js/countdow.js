 window.location.href = "http://localhost/PUBG/";
 
var mang=[];

  $(".time_read").each(function(index){
    mang[index]=new Date($(this).text());
    
  });

 var now = new Date().getTime();
  
  // Find the distance between now an the count down date
  
  //Sat Feb 03 2018 20:20:06 GMT+0700 (SE Asia Standard Time)
  //Fri Mar 02 2018 19:17:36 GMT+0700 (SE Asia Standard Time)
// Update the count down every 1 second
var x = setInterval(function() {
  $(".countdown").each(function(index){
    var now = new Date().getTime();

  // Find the distance between now an the count down date
    var distance = mang[index] - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    $(this).html(days + "d " + hours + "h "
     + minutes + "m "+ seconds + "s ");

    // If the count down is finished, write some text 
    if (distance < 0) {
      clearInterval(x);
     
     $(".countdown").html("EXPIRED");
    }
  });
  // Get todays date and time
  
}, 1000);

















































 // var mang=$(".time_read").text().split(" ");
 //    var time_add=$(".time").text().substring(0,$(".time").text().length-1);
 //    var time=mang[1];
 //    var time_red=parseInt(mang[1].substring(0,2))+parseInt(time_add);
 //    // thoi gian thue
 //    var today = new Date();
 
 //    // Giờ, phút, giây hiện tại
 //    var h = today.getHours();
 //    var m = today.getMinutes();
 //    var s = today.getSeconds();
 //      var time_read_h=(time_red-h>=0)?(time_red-h):0;
 //      if(time_red-h>24){
 //        time_red-h=time_red-h-24;
 //      }
 //      if(time_red-h-h>time_add){
 //        time_red-h=time_red-h-23;
 //      }
 //      var time_read_m=(parseInt(mang[1].substring(3,5))-m)>=0?parseInt(mang[1].substring(3,5))-m:60-parseInt(mang[1].substring(3,5));
 //      var time_read_s=parseInt(mang[1].substring(6,8))-s;

     
 //    var x = setInterval(function() {
       
 //        time_read_s--;
       
 //        if(time_read_s<=0 && time_read_m>0){
 //          time_read_s=59;
 //          time_read_m--;
 //          if(time_read_m<=0 &&time_read_h >0){
 //            time_read_m=59;
 //            time_read_h--;
            
 //          }
 //        }
 //        if(time_read_h<=0 && time_read_m<=0 && time_read_s<=0){
 //            clearInterval(x);
 //             $.ajax({url: "update.php", success: function(result){
 //                  if(result=="Ok"){
 //                    alert("Ok");
 //                  }
 //              }});
 //        }
       
 //        $(".countdown").html(time_read_h +"h:  "+time_read_m+"p: "+time_read_s+"s");//  hours + "h "       
 //    }, 1000);