function ajust_position(){var e=jQuery(".bar_left_ele_tb.center_left_ele_tb").height(),t=e/2;jQuery(".bar_left_ele_tb.center_left_ele_tb").css("margin-top","-"+t+"px")}function ajust_size(){var e=jQuery(".bar_left_ele_tb").innerHeight();if(e>jQuery(window).height()){var t=e-jQuery(window).height()+84,i=t/42;jQuery(".cunjo_socials_left_ele_tb > li").slice(-i.toFixed()).hide(),ajust_position()}"hidden"==jQuery.cookie("cunjo_share_left_ele_tb")?(jQuery(".bar_left_ele_tb").hide(),jQuery(".show_left_ele_tb").show(),jQuery(".bar_left_ele_tb").css("visibility","visible")):(jQuery(".bar_left_ele_tb").show(),jQuery(".bar_left_ele_tb").css("visibility","visible")),ajust_position()}function escape_html_special_chars(e){return e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#039;")}setTimeout(function(){ajust_size()},300),jQuery(document).ready(function(){jQuery(window).resize(function(){ajust_size()}),jQuery(document.body).on("click",".left_ele_tb .cunjo_socials a.email",function(){jQuery(".left_ele_tb .cunjo_socials a.email").poshytip("show")}),jQuery(document.body).on("click",".close-email",function(){jQuery(".left_ele_tb .cunjo_socials a.email").poshytip("hide")}),jQuery(document.body).on("click",".bar_left_ele_tb ul.left_ele_tb li.close_left_ele_tb",function(){jQuery(this).parent().parent(".bar_left_ele_tb").slideUp(300),jQuery(this).parent().parent(".bar_left_ele_tb").siblings(".show_left_ele_tb").slideDown(300),jQuery.cookie("cunjo_share_left_ele_tb","hidden",{expires:7,path:"/"})}),jQuery(document.body).on("click",".show_left_ele_tb",function(){jQuery(this).slideUp(300),jQuery(this).siblings(".bar_left_ele_tb").slideDown(300),jQuery.removeCookie("cunjo_share_left_ele_tb",{expires:7,path:"/"})}),jQuery("#cunjo_to").poshytip({liveEvents:!0,className:"tip-darkgray",showOn:"focus",alignTo:"target",alignX:"right",alignY:"left",offsetX:5,showTimeout:100}),jQuery(document.body).on("click","#submitemail_left_ele_tb",function(){jQuery(".email-sending").fadeIn(200),jQuery.ajax({type:"POST",url:"http://share.cunjo.com/wp-content/themes/share/inc/sendit.php",crossDomain:!0,data:jQuery(".send-email_left_ele_tb #cunjo_share_email").serialize()}).done(function(e){jQuery(".email-sending").hide(),"success"==e?(jQuery(".email-sent").fadeIn(200),jQuery.ajax({type:"POST",url:"http://cunjo.com/socialanalytics/ajaxify/handle_email.php",crossDomain:!0,data:"to="+$(".send-email_left_ele_tb #cunjo_receiver").val()+"&from="+$(".send-email_left_ele_tb  #cunjo_sender").val()+"&api="+$('a[cunjo="share"]').attr("shareid")}).done(function(){})):jQuery(".email-notsent").fadeIn(200)})})});