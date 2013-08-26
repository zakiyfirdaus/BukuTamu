//script tambahan yang digunakan

$(document).ready(function(){

    //======================================================
    //script untuk validasi
    var jVal = {
        //validasi nama
       'nama' : function() {
        
            $('#input-nama').append('<div id="nameInfo" class="info col-md-offset-10"></div>');
        
            var nameInfo = $('#nameInfo');
            var ele = $('#nama');
            
            var eleval = ele.val();
            //nama tidak boleh kosong atau hanya whitespace
            if(eleval.length < 1 || !eleval.match(/\S/)) {
                jVal.errors = true;
                nameInfo.removeClass('correct').addClass('error').removeClass('validating').html('nama harus diisi').show();
                ele.removeClass('normal').addClass('wrong');
            } else {
                nameInfo.removeClass('error').addClass('correct').removeClass('validating').html('&radic;&nbsp;').show();
                ele.removeClass('wrong').addClass('normal');
            }
        },
        //validasi email
        'email' : function() {

            $('#input-email').append('<div id="emailInfo" class="info col-md-offset-10"></div>');

            var emailInfo = $('#emailInfo');
            var ele = $('#email');
            //mendefinsikan format email yang diterima
            var patt = /^.+@.+[.].{2,}$/i;

            if(!patt.test(ele.val())) {
                jVal.errors = true;
                emailInfo.removeClass('correct').addClass('error').removeClass('validating').html('email harus diisi dengan benar').show();
                ele.removeClass('normal').addClass('wrong');
            } else {
                emailInfo.removeClass('error').addClass('correct').removeClass('validating').html('&radic;&nbsp;').show();
                ele.removeClass('wrong').addClass('normal');
            }
        },
        //validasi pesan
        'pesan' : function() {

            $('#input-pesan').append('<div id="pesanInfo" class="info col-md-offset-10"></div>');

            var pesanInfo = $('#pesanInfo');
            var ele = $('#pesan');
            
            var eleval = $('#pesan').val();
            
            //pesan tidak boleh kosong atau hanya whitespace
            if(eleval.length < 1 || !eleval.match(/\S/)) {
                jVal.errors = true;
                pesanInfo.removeClass('correct').addClass('error').removeClass('validating').html('pesan harus diisi').show();
                ele.removeClass('normal').addClass('wrong').css({
                    'font-weight': 'normal'
                });
            } else {
                pesanInfo.removeClass('error').addClass('correct').removeClass('validating').html('&radic;&nbsp;').show();
                ele.removeClass('wrong').addClass('normal');
            }
        },
        
        //fungsi submit jika validasi berhasil
        'send' : function (){
            if(!jVal.errors) {
                $('#form-bukutamu').submit();
            }
        }
    };

    //======================================================
    //fungsi refresh bagian guest book setiap 5 detik
    var auto_refresh = setInterval(
        function ()
        {
            $('#bukutamu-div').load('guestbook.php');
        }, 5000); 
    
    //======================================================
    //fungsi load guest book baru lalu mengaktifkan kembali tombol submit input setelah loading selesai
    function loader(){
        $('#cek').attr("value", "false");
        $('#bukutamu-div').load('guestbook.php');
        var init = true;
        $(document).ajaxStop(function(){
            if(init){
                enabling();
                init = false;
            }
        });
        return false;
    }
    
    //======================================================
    //fungsi mengaktifkan kembali tombol submit input
    var enabling = function () {
        document.getElementById("kirim").disabled=false;
        return false;
    };
    

    //======================================================
    //funsgi saat tombol submit diklik
    $('#kirim').click(function (){
        //melakukan fungsi-fungsi validasi
        jVal.errors = false;
        jVal.nama();
        jVal.email();
        jVal.pesan();
        //jika validasi gagal, halaman akan diarahkan ke bagian pengisian
        if(jVal.errors){
            $('html, body').animate({

                scrollTop: $("#isi").offset().top
            }, 1000);
            return false;
        }
        //fungsi-fungsi jika validasi berhasil
        //menonaktifkan tombol submit
        document.getElementById("kirim").disabled=true;
        //mengirim data submit
        jVal.send();
        //mengosongkan form
        document.getElementById("nama").value = "";
        document.getElementById("email").value = "";
        document.getElementById("pesan").value = "";
        
        //menghilangkan tampilan validasi
        $('#nameInfo').removeClass('error').removeClass('correct').removeClass('validating').html('').hide();
        $('#emailInfo').removeClass('error').removeClass('correct').removeClass('validating').html('').hide();
        $('#pesanInfo').removeClass('error').removeClass('correct').removeClass('validating').html('').hide();
        
        //load guest book baru lalu mengaktifkan kembali tombol submit input setelah loading selesai
        loader();
        return false;
        
    });

    //======================================================
    //fungsi-fungsi untuk melakukan validasi saat fokus dari suatu input hilang
    $('#nama').blur(jVal.nama);
    $('#email').blur(jVal.email);
    $('#pesan').blur(jVal.pesan);
    
    
    //======================================================
    //fungsi-fungsi tampilan validasi saat fokus pada suatu input
    $('#nama').focus(function(){
        $('#nama').removeClass('wrong').addClass('normal');
        $('#nameInfo').removeClass('error').removeClass('correct').addClass('validating').html('. . .').show();
    })
    $('#email').focus(function(){
        $('#email').removeClass('wrong').addClass('normal');
        $('#emailInfo').removeClass('error').removeClass('correct').addClass('validating').html('. . .').show();
    })
    $('#pesan').focus(function(){
        $('#pesan').removeClass('wrong').addClass('normal');
        $('#pesanInfo').removeClass('error').removeClass('correct').addClass('validating').html('. . .').show();
    })
    
    
    //======================================================
    //fungsi-fungsi untuk melakukan validasi saat nilai suatu input berganti
    $('#nama').change(jVal.nama);
    $('#email').change(jVal.email);
    $('#pesan').change(jVal.pesan);
        
        
    //======================================================
    //fungsi-fungsi navigasi yang dilakukan dengan scrolling halaman
    $("#scroll-isi").click(function (){
        $('html, body').animate({
            scrollTop: $("#isi").offset().top
        }, 1000);
    });
    $("#scroll-bukutamu").click(function (){
        $('html, body').animate({
            scrollTop: $("#bukutamu").offset().top
        }, 1000);
    });
    $("#scroll-awal").click(function (){
        $('html, body').animate({
            scrollTop: $("#awal").offset().top
        }, 1000);
    });
    
    
    //======================================================
    //fungsi yang dilakukan saat submit data form dilakukan
    //melakukan loading guest book tanpa pindah halaman
    $("#form-bukutamu").submit(function() {
        $.post($("#form-bukutamu").attr("action"), $("#form-bukutamu").serialize(), function(data){
            $('#bukutamu-div').load('guestbook.php');
            
        });
        return false;
    });
    
    
    
});