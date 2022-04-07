$(function(){
    /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
            
            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });
            
            }).on('mouseout', function(){
                $(this).parent().children('li.star').each(function(e){
                    $(this).removeClass('hover');
            });
        });
    /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');
            
            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }
            
            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }
            alert("Thank you for your feedback for  "+ onStar + " star(s) rating. Please share your thoughts via email because this page is not hooked up to any servicing backend")
        
        });

        /*image slider*/
        var imgSlideIndex = 1;
        function showImage(pos){
            var x = document.getElementsByClassName("slides");
            if(pos > x.length){ imgSlideIndex = 1;}
            if(pos < 1) {imgSlideIndex = x.length;}
            for(var i = 0; i < x.length; i++){
                x[i].style.display = "none";
            }
            x[imgSlideIndex-1].style.display="block";
        }
        showImage(imgSlideIndex);

        $("button").click(function(){
            var val = parseInt( $(this).data('value'), 10);
            // alert("btn click detected and value is " + val);
            showImage(imgSlideIndex += val);            
        });
});

