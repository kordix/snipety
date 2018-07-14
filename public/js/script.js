// require("jsdom").env("", function(err, window) {
// if (err) {
//     console.error(err);
//     return;
// }
//
// var $ = require("jquery")(window);
// });
//
// $(document).ready(function(){
//
//
//
//     console.log('test');
//
//
//
//
// });

console.log('siemano');

$(document).ready(function(){
    $(function(){
        // alert('siemano');
     });

     $('#button').click(function(){
         console.log('siemano');
         $('#answer').toggleClass('hidden');
     });

});
