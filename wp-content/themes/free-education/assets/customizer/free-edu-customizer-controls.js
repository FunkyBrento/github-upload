jQuery(document).ready(function($) {

    "use strict";

    /**
     * Script for switch option
     */
     $('.switch_options').each(function() {
        //This object
        var obj = $(this);

        obj.children('.switch_part').on('click', function(){
            var switchVal = $(this).attr('data-switch');
            obj.children('.switch_part').removeClass('selected');
            $(this).addClass('selected');
            obj.children('input').val(switchVal).change();
        });

    });

    /**
     * Radio Image control in customizer
     */
    // Use buttonset() for radio images.
    $( '.customize-control-radio-image .buttonset' ).buttonset();

    // Handles setting the new value in the customizer.
    $( '.customize-control-radio-image input:radio' ).change(
        function() {

            // Get the name of the setting.
            var setting = $( this ).attr( 'data-customize-setting-link' );

            // Get the value of the currently-checked radio input.
            var image = $( this ).val();

            // Set the new value.
            wp.customize( setting, function( obj ) {

                obj.set( image );
            } );
        }
        );

    // repeater 
    jQuery(document).ready(function($) {

        "use strict";

  /**
   
    /**
      * Function for repeater field
      */
      function free_education_refresh_repeater_values(){
        $(".ed-repeater-field-control-wrap").each(function(){

            var values = []; 
            var $this = $(this);
            
            $this.find(".ed-repeater-field-control").each(function(){
                var valueToPush = {};   

                $(this).find('[data-name]').each(function(){
                    var dataName = $(this).attr('data-name');
                    var dataValue = $(this).val();
                    valueToPush[dataName] = dataValue;
                });

                values.push(valueToPush);
            });

            $this.next('.ed-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    $('#customize-theme-controls').on('click','.ed-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.ed-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.ed-repeater-field-close', function(){
        $(this).closest('.ed-repeater-fields').slideUp();;
        $(this).closest('.ed-repeater-field-control').toggleClass('expanded');
    });

    $("body").on("click",'.ed-repeater-add-control-field', function(){

        var fLimit = $(this).parent().find('.field-limit').val();
        var fCount = $(this).parent().find('.field-count').val();
        if( fCount < parseInt(fLimit) ) {
            fCount++;
            $(this).parent().find('.field-count').val(fCount);
        } else {
            $(this).before('<span class="ed-limit-msg"><em>Only '+fLimit+' repeater field will be permitted.</em></span>');
            return;
        }

        var $this = $(this).parent();
        if(typeof $this != 'undefined') {

            var field = $this.find(".ed-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){

                field.find("input[type='text'][data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });
                
                field.find(".ed-repeater-icon-list").each(function(){
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.ed-repeater-selected-icon').children('i').attr('class','').addClass(defaultValue);
                    
                    $(this).find('li').each(function(){
                        var icon_class = $(this).find('i').attr('class');
                        if(defaultValue == icon_class ){
                            $(this).addClass('icon-active');
                        }else{
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find(".attachment-media-view").each(function(){
                    console.log('test');
                    var defaultValue = $(this).find('input[data-name]').attr('data-default');
                    $(this).find('input[data-name]').val(defaultValue);
                    if(defaultValue){
                        $(this).find(".thumbnail-image").html('<img src="'+defaultValue+'"/>').prev('.placeholder').addClass('hidden');
                    }else{
                        $(this).find(".thumbnail-image").html('').prev('.placeholder').removeClass('hidden');   
                    }
                });

                field.find('.ed-repeater-fields').show();

                $this.find('.ed-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.ed-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                free_education_refresh_repeater_values();
            }

        }
        return false;
    });
    
    $("#customize-theme-controls").on("click", ".ed-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.ed-repeater-field-control').slideUp('normal', function(){
                $(this).remove();
                free_education_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]',function(){
        free_education_refresh_repeater_values();
        return false;
    });

    /*Drag and drop to change order*/
    $(".wc-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function( event, ui ) {
            free_education_refresh_repeater_values();
        }
    });

    $('body').on('click', '.ed-repeater-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.ed-repeater-icon-list').prev('.ed-repeater-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.ed-repeater-icon-list').next('input').val(icon_class).trigger('change');
        free_education_refresh_repeater_values();
    });

    $('body').on('click', '.ed-repeater-selected-icon', function(){
        $(this).next().slideToggle();
    });
});
});