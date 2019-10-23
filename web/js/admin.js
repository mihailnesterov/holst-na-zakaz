/* admin js */

/*const app = new Vue({
    el: '#root',
    data: {
        
    },
    methods: {
        
    },
    computed: {

    },
    mounted() {

    }
});*/

//const formCategory = $('#form-category');

//console.log( $(formCategory).html() );

/*const catalogName = $('#catalog-name').val();

console.log( catalogName );


const catalogParent = $('#catalog-parent').val();

console.log( catalogParent );


const catalogDescription = $('#catalog-description').val();

console.log( catalogDescription );*/

$( function() {

    $('#baget-image-file-input').on('change',function(){
        
        $('#form-baget-image-input').val( $(this).val() );
        console.log('change =' + $(this).val());
    });


    $('#baget-image-file-input1').on('change',function() {
        console.clear();
        
        const value = $(this).val().replace(/^.*\\/, "");
        const imageName = value.replace(/\..*/, '');
        //const imageName = value.substr(0,value.indexOf("."));
        const imageExt = $(this).val().substr( $(this).val().indexOf(".") );
        const random = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15) + imageExt;

        console.log( value );
        console.log( imageName );
        console.log( imageExt );
        console.log( random );

        previewImage('baget-img','baget-image-file-input','form-baget-image-input');
    });
} );

// admin: download image function
function previewImage(imgId, fileId, fileNameId) {  
    // создаем переменные для картинки и файла из input
    var preview = document.getElementById(imgId);
    var file    = document.getElementById(fileId).files[0];
    var reader  = new FileReader();
    reader.onloadend = function () {
        preview.src = reader.result;
        // file name generetion
        function RandomString(length) {    
            var str = '';
            for ( ; str.length < length; 
                str += Math.random().toString(36).substr(2) );
            return str.substr(0, length);
        }(20);
        // get file extantion
        var ext = file.name.substring(file.name.lastIndexOf('.'));
        document.getElementById(fileNameId).value = RandomString(20) + ext;
    }
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "images/image.png";
    }
}

//$('#form-baget1').on('submit', function(e) {
    /**
     * e - event, объект события
     * https://learn.javascript.ru/obtaining-event-object
     * 
     * function name(args[], callback)
     * Колбэк (callback) – функция обратного вызова, которая должна быть выполнена 
     * после того, как завершила выполнение основная функция
     */
    /*e.preventDefault();
    const self = $(this);
    console.clear();
    
    setInterval(function(){
        console.log('e=' + e.target.getAttribute('id'));
        console.log('this=' + JSON.stringify(self)); // parse
    },3000);*/
//});

/*$('#form-baget').on('submit', function(e) {
    e.preventDefault();
    console.clear();
    const $form = $(this);
    $.ajax({
        url: $form.attr('action'),
        type: $form.attr('method'),
        data: $form.serialize(),
        success: function(response) {
            const res = JSON.stringify(response);
            console.log( res );
        },
        error: function(err) {
            console.log( JSON.stringify(err.readyState) );
        }
    });
});*/


/**
 * 
 * 
 * function name(args[], callback)
 * Колбэк (callback) – функция обратного вызова, которая должна быть выполнена 
 * после того, как завершила выполнение основная функция
 */

setTimeout(function(){
    console.log('setTimeout');
},3000);

setInterval(function(){
    console.log('setInterval');
},2000);