"use strict";

var app = {

    init: function () {
        var path = window.location.pathname,
            parts = path.split('/'),
            category = parts.pop() == '' ? parts[parts.length - 1] : parts.pop();

        console.log('app.init', category);

        if (category !== '') {
            app.getPosts(category);
        }

    },

    getPosts: function (category) {
        console.log('app.getPosts');

        var rootURL = '/wp-json';

        $.ajax({
            type: 'GET',
            async: true,
            url: rootURL + '/posts?filter[category_name]=' + category,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }

        });

    },

    getSinglePost: function (postID) {
        console.log('getSinglePost');

        var rootURL = 'http://artoflearning.dev/wp-json';

        $.ajax({
            type: 'GET',
            url: rootURL + '/posts/' + postID,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                // DO SOMETHING

            },
            error: function (error) {
                console.log(error);
            }

        });

    },

    route: function (e) {

        console.log(e);

        var path = $(e).attr('href'),
            parts = path.split('/'),
            category = parts.pop() == '' ? parts[parts.length - 1] : parts.pop();

        console.log(category);

        switch (category) {
        case !'':

            app.getPosts(category);
            break;
        case '':
            app.getSinglePost(category);
            break;
        default:

            console.log('home page');
            app.init();
            break;

        }

    }

}


$('ul .cat-item a, .mmp-gmap-container ').click(function (event) {
    event.preventDefault();
    app.route(this);

});