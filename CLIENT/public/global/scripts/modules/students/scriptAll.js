/**
 * Created by dany_ on 17/3/2017.
 */
$(document).ready(function(){
   $.ajax(
       {
           method: "GET",
           url: "/Alumnos",
           data: {},
       }
   ).done(function (data) {
       console.log(data);
   })
});