$(document).ready(function(){
$("#s").focus(function(){
$(this).stop(true,false).animate({width:"150px"},"quick");
})
.blur(function(){
$(this).animate({width:"72px"},"quick");
});
});

$(document).ready(function() {
$('#nav li').hover(function() {
$('ul', this).slideDown(300)
},
function() {
$('ul', this).slideUp(300)
});
});
