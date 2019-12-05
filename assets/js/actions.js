$(document).ready(function(){
  x_navigation();
});
function x_navigation_minimize(action){

    if(action == 'open'){
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");

    }

    if(action == 'close'){
        $(".page-container").addClass("page-container-wide");
        $(".page-sidebar .x-navigation").addClass("x-navigation-minimized");

    }

    $(".x-navigation li.active").removeClass("active");

}

function x_navigation(){

    $(".x-navigation-control").click(function(){
        $(this).parents(".x-navigation").toggleClass("x-navigation-open");



        return false;
    });

    if($(".page-navigation-toggled").length > 0){
        x_navigation_minimize("close");
    }

    $(".x-navigation-minimize").click(function(){

        if($(".page-sidebar .x-navigation").hasClass("x-navigation-minimized")){
            $(".page-container").removeClass("page-navigation-toggled");
            x_navigation_minimize("open");
        }else{
            $(".page-container").addClass("page-navigation-toggled");
            x_navigation_minimize("close");
        }



        return false;
    });

    $(document).off('click',".x-navigation li").on('click',".x-navigation li",function(event){
      event.stopPropagation();

        var li = $(this);

            if(li.children("ul").length > 0 || li.children(".panel").length > 0){
                if(li.hasClass("active")){
                    li.removeClass("active");
                }else{
                    li.addClass("active");
                }
                    return false;
            }
    });


}
/* EOF X-NAVIGATION CONTROL FUNCTIONS */
/* accordion function*/
$(document).off('click',".accordion .panel-heading").on('click',".accordion .panel-heading",function(){
  var id = $(this).attr("id");
  $('#container-'+id).toggleClass("panel-body-open");
});
/*pricing widget*/
$(document).off('click',".pricing .panel-footer button").on('click',".pricing .panel-footer button",function(){
  $(".pricing .active").removeClass("active");
  $(this).closest('.panel').addClass("active");
});
/* character counter */
$(document).off("keydown",".char-textarea").on("keydown",".char-textarea",function(event){
  checkTextAreaMaxLength(this,event);
});
/*Checks the MaxLength of the Textarea*/
function checkTextAreaMaxLength(textBox, e) {

    var maxLength = parseInt($(textBox).data("length"));


    if (!checkSpecialKeys(e)) {
        if (textBox.value.length > maxLength - 1) textBox.value = textBox.value.substring(0, maxLength);
   }
  $(".char-count span").html(maxLength - textBox.value.length);

    return true;
}
/*Checks if the keyCode pressed is inside special chars*/
function checkSpecialKeys(e) {
    if(e.ctrlKey && e.keyCode === 13){
      toggleForm();
      return false;
    }
    else if (e.keyCode != 8 && e.keyCode != 46 && e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40)
        return false;
    else
        return true;
}
