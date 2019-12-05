$(function() {
    var uiElements = function(){
        

        // Sparkline
        var uiSparkline = function(){
            
            if($(".sparkline").length > 0)
               $(".sparkline").sparkline('html', { enableTagOptions: true,disableHiddenCheck: true});   
           
       }// End sparkline              
       
       
        return {
            init: function(){
                uiSparkline();
            }
        }
        
    }();
    
    uiElements.init();            
});

