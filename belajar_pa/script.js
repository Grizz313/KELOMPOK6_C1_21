
// untuk mengubah warna text marquee ketika di courser menuju text

 $(document).ready(function(){
   $("#text").on({
       mouseover: function(){
           $(this).css("color", "red");
       }
   }); 
   
   $("#text").on({
      mouseout: function(){
          $(this).css("color", "black");
      }
  });    
});


//  untuk menggubah gambar ketika mouse menuju foto
function layer1(){
    document.getElementById('foto').src="lapangan.avif";
}

function layer2(){
   document.getElementById('foto').src="foto_hendy.jpg";
}
document.getElementById('foto').addEventListener('mouseover', layer1);
document.getElementById('foto').addEventListener('mouseout', layer2);


//  untuk menggubah gambar ketika mouse menuju foto bagian aboute me
 function fotoHendy1(){
     document.getElementById('gambar').src="foto_hendy3.jpg";
 }

 function fotoHendy2(){
    document.getElementById('gambar').src="foto_hendy_1.jpeg";
 }
 document.getElementById('gambar').addEventListener('mouseover', fotoHendy1);
 document.getElementById('gambar').addEventListener('mouseout', fotoHendy2);
