(function(){
  jQuery(document).ready(function(){
    
    var init = function() {
      
      var $body = jQuery("body"); 
           
      //Dynamic fields
      var countHeader = 0;
      var countData = 0;                
      jQuery("#rcui-button-add-header").on("click", function(){        
        jQuery(this).before("<div class='rcui-row'><input type='text' name='tx_restclientui_tools_restclientuirestclientui[request][header]["+ ++countHeader +"]' class='w40' ><input type='text' name='tx_restclientui_tools_restclientuirestclientui[request][header]["+ ++countHeader +"]'  class='w40' ><button type='button' class='rcui-button-remove-header'>-</button></div>");        
      });
      jQuery("#rcui-button-add-data").on("click", function(){        
        jQuery(this).before("<div class='rcui-row'><input type='text' name='tx_restclientui_tools_restclientuirestclientui[request][data]["+ ++countData +"]' class='w40' ><input type='text' name='tx_restclientui_tools_restclientuirestclientui[request][data]["+ ++countData +"]'  class='w40' ><button type='button' class='rcui-button-remove-data'>-</button></div>");
      });
      $body.on("click", ".rcui-button-remove-header", function(){               
        jQuery(this).parent().remove();
      });      
      $body.on("click", ".rcui-button-remove-data", function(){               
        jQuery(this).parent().remove();
      });
      
      //Cancel request
      jQuery("#rcui-button-cancel-request").click(function() {        
        jQuery('#rcui-input-method').find("option[value='GET']").attr("selected", true);
        jQuery("#rcui-input-url").val("");
        jQuery(".rcui-row").remove();
      });
      
      //Close response
      $body.on("click", "#rcui-button-close-response", function(){               
        jQuery("#rcui-response").empty();
      });   
      
      //Submit request
      jQuery("#rcui-button-go").click(function(){
        
        var $rcuiInputUrl = jQuery("#rcui-input-url"),
          templateMessage = jQuery("#rcui-template-messsage").html(), 
          templateResponse = jQuery("#rcui-template-response").html(),
          $rcuiResponse = jQuery("#rcui-response"),
          $rcuiResponseDetails,
          contentHeader = '',
          $rcuiResponseMessage;
        
        if ($rcuiInputUrl.val().trim() === "") {
          $rcuiInputUrl.focus();          
          return false;
        }
          
        jQuery.post(
          TYPO3.settings.ajaxUrls["HttpClientUiController::sendRequest"], 
          jQuery("#rcui-request").serialize(),
          function(info) {
            $rcuiResponse.empty();//reset            
            if (info['response']['status']['success'] === true) {
              $rcuiResponse.append("<div id='rcui-response-details'></div>");              
              $rcuiResponseDetails = jQuery("#rcui-response-details");
              $rcuiResponseDetails.append(templateResponse.replace("###HEADER###", "Status").replace("###TEXT###", "<strong>"+info['response']['data']['httpCode']+"</strong>"));
              $rcuiResponseDetails.append(templateResponse.replace("###HEADER###", "Time").replace("###TEXT###", "Connection: "+info['response']['data']['connectionTime']+"<br/>Transfer: "+info['response']['data']['totalTime']));
              for (var indexHeader in info['response']['data']['header']) {
                if (indexHeader === "Status-Code") {
                  contentHeader += info['response']['data']['header'][indexHeader]+"<br/>";
                }
                else {
                  if (indexHeader !== "" && info['response']['data']['header'][indexHeader] !=="") {                                  
                    contentHeader += indexHeader + ": " +info['response']['data']['header'][indexHeader]+"<br/>";
                  }
                }
              }
              $rcuiResponseDetails.append(templateResponse.replace("###HEADER###", "Headers").replace("###TEXT###", contentHeader));
              $rcuiResponseDetails.append(templateResponse.replace("###HEADER###", "Body").replace("###TEXT###", info['response']['data']['body']));
            }
            else {
              $rcuiResponse.append("<div id='rcui-response-message'></div>");              
              $rcuiResponseMessage = jQuery("#rcui-response-message");              
              $rcuiResponseMessage.append(templateMessage.replace("###HEADER###", "Oops! Something went wrong...").replace("###TEXT###", "Errors details: "+info['response']['status']['message']));
            }
            $rcuiResponse.append("<button type='button' id='rcui-button-close-response' class='button-action'>Close</button>");            
            jQuery("#rcui-response-header")[0].scrollIntoView();            
          }
        );                
      });
            
    };
    
    init();
  });
  
}());
