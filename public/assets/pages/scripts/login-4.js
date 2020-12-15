    var Login = function () {
        return {
            //main function to initiate the module
            init: function () {


                // init background slide images
                $.backstretch([
                        " {{asset('assets/pages/media/bg/1.jpg')}} ",
                        "{{asset('assets/pages/media/bg/2.jpg')}} ",
                        "<{{asset('assets/pages/media/bg/3.jpg')}} ",
                        "<{{asset('assets/pages/media/bg/4.jpg')}}"
                    ], {
                        fade: 1000,
                        duration: 8000
                    }
                );
            }
        };

    }();