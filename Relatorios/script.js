$(document).ready(function() {
    $("tr").each(function(){
        this.click(function(){
            this.toggleClass("active")
        })
    })
});