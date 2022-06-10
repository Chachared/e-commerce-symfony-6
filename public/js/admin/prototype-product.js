
$(document).ready(function () {
  $(".addPicture").click(function (e) {
    var list = $($(this).attr("data-list-selector"));
    // Try to find the counter of the list or use the length of the list
    var counter = list.data("widget-counter") || list.children().length;

    // grab the prototype template
    var newWidget = $("#admin_product_pictures").attr("data-prototype");
    
    // replace the "__name__" used in the id and name of the prototype
    // with a number that's unique to your pictures
    // end name attribute looks like name="product[pictures][2]"
    newWidget = newWidget.replace(/__name__label__/g, "photo n°"+parseInt(counter+1));
    newWidget = newWidget.replace(/__name__/g, "photo_"+parseInt(counter+1));
    // Increase the counter
    counter++;
    // And store it, the length cannot be used if deleting widgets is allowed
    list.data("widget-counter", counter);

    // create a new list element and add it to the list
    var newElem = $(list.attr("data-widget-tags")).html(newWidget);
    newElem.appendTo(list);
    console.log(newElem);
  });
});
