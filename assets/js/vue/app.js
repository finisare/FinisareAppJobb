
window.addEventListener( 'load' , () => {

      new Vue({
        el: '#list',

        /*
        components: {

        },
        mounted: function(){

              axios.post("http://aygunesenerji.com/panel/App/api/slider/readSlider.php");
                .then(response => console.log( response ) );
        },
        */


        data: {
          message: 'wefwefwfwefwefwef',
          mesajVer: 'BURASI NERESİ',
          link: 'https://alinedim.com',
          messageData: "<i>BURADAYIMM</i>",
          buttonText: "Buraya Tıkla",
          gelinceGoster: 'You loaded this page on ' + new Date().toLocaleString()
        },

        methods: {
          arttir( data ){
                Swal.fire({
                   icon: 'error',
                   title: data,
                   text: this.mesajVer,
                   footer: '<a href>Why do I have this issue?</a>'
                 })
          }
        }

      })


}

)
