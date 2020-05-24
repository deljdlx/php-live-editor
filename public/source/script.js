
function slugify(string) {
    let slug = string;
    slug = slug.replace(/[^a-zA-Z0-9]/g, '-');

    return slug;
}

function refresh() {
    $.ajax({
        url: 'render.php?' + (new Date()).getTime(),
        success: function(response) {
            document.getElementById('container').innerHTML = response;
            setTimeout(function() {
                //refresh();
            }, 500);
        }
    })
}




let application = new Application('editor');


$(".panel-left").resizable({
    handles: "e"
});
$(".panel-center").resizable({
    handles: "e"
});


let containerHeight = $(".editor .workspace .panel-center").outerHeight();
const mainSize = $(".editor .workspace .panel-center .panel-main").height();
$(".editor .workspace .panel-center .console").height((containerHeight - mainSize) + 'px');

$(".editor .workspace .panel-center .panel-main").resizable({
    handles: "s",
    resize: function(event) {
        const mainSize = $(".editor .workspace .panel-center .panel-main").height();
        $(".editor .workspace .panel-center .console").height((containerHeight - mainSize) + 'px');
        application.editor.resize();
    }

});


$( function() {
    $( "#tabs" ).tabs();
  } );


//editor.resize();





//application.loadExemple('week');