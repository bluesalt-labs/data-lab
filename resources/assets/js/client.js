(function(window){
    'use strict';
    function define_data_lab() {
        var DataLab = {};

        DataLab.init = function(settings) {
            if( settings.hasOwnProperty('app_key') ) {} //  ?
            if( settings.hasOwnProperty('client_id') ) {} //  ?
        };

        // Final Statement
        return DataLab;
    }

    if(typeof(DataLab) === 'undefined') {
        window.DataLab = define_data_lab();
    } else {
        console.log("DataLab is already defined.");
    }
})(window);

// This will need to store a cookie or something on the client side so the session can remain intact across pages.
// Ideally it will open a modal that asks for the user to login if they aren't already, then/or ask permission to
// register their DataLab account with the current application. This should also provide functionality to
// show/hide/change the title of the login button that the application will have (if applicable).