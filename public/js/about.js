// <div class="col-sm-4 text-center">
//     <img class="img-responsive" src="http://placehold.it/750x450" alt="">
//     <h3>John Smith
// <small>Job Title</small>
// </h3>
// </div>
$(document).ready(function () {

    $.ajax({
        url: 'about',
        type: 'GET',
        success: function (response) {
            console.log(response);
        }
    });

});
