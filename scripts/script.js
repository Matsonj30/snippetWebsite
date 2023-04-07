function showForm(){
    var form = document.getElementById("inputForm")
    form.style.display = "block"
}






//scroll events still trigger on button clicks, not manual scrolling (any scrolling of any event)
document.getElementById("scrollContainer").addEventListener("scroll", scrollEvent);

function changeTestimonial(direction){
    var currentTestimonial = getCurrentTestimonial()
    //current spot +- 1 depending on button clicked
    nextIndex = currentTestimonial + direction;
    if(nextIndex == -1){
        nextIndex = 2;
    }
    else if(nextIndex == 3){
        nextIndex = 0;
    }

    var nextTestimonial = document.getElementById("test"+ (nextIndex)); 
    nextTestimonial.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});

}
function getCurrentTestimonial(){
    scrollContainer = document.getElementById("scrollContainer");
    var testimonials = scrollContainer.getElementsByClassName("testimonial");

    var positionInContainer = scrollContainer.scrollLeft;
    var widthOfTestimonial = testimonials[0].offsetWidth; //all same width
    var currentTestimonial = Math.floor(positionInContainer / widthOfTestimonial);
    return currentTestimonial;
}

//cant put this in the scroll event listener for some reason
function scrollEvent(){
    changeCircleColor(getCurrentTestimonial())
}
function changeCircleColor(currentTestimonial){
    for(i = 0; i < 3; i+=1){
        var circle = document.getElementById("circle"+i)
        if(currentTestimonial == i){
            circle.style.backgroundColor = "#fafafa"
        }
        else{
            circle.style.backgroundColor = "#bdbdbd"
        }
    }

}