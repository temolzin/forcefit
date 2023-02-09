function rand(n) {
     // creamos un numero al azar entre 1 y 10 (o cual sea la cantidad de imágenes)
     return (Math.floor(Math.random() * n + 1));
}
//guardas imagenes en el array
var cambia_imagen = new Array();
cambia_imagen[0] = "public/img/login/gym1.jpg";
cambia_imagen[1] = "public/img/login/gym2.jpg";
cambia_imagen[2] = "public/img/login/gym3.jpg";
cambia_imagen[3] = "public/img/login/gym4.jpg";
cambia_imagen[4] = "public/img/login/gym5.jpg";
cambia_imagen[5] = "public/img/login/gym6.jpg";
cambia_imagen[6] = "public/img/login/gym7.jpg";
cambia_imagen[7] = "public/img/login/gym8.jpg";  
cambia_imagen[8] = "public/img/login/gym9.jpg";
cambia_imagen[9] = "public/img/login/gym10.jpg";
cambia_imagen[10] = "public/img/login/gym11.jpg";
cambia_imagen[11] = "public/img/login/gym12.jpg";
cambia_imagen[12] = "public/img/login/gym13.jpg";
cambia_imagen[13] = "public/img/login/gym14.jpg";
cambia_imagen[14] = "public/img/login/gym15.jpg";
cambia_imagen[15] = "public/img/login/gym16.jpg";

//la función para que al clickear establezca el source del tag imagem que tiene id "ia" (Imagen aleatoria)
//como no son tantas, puede que alguna vez se repita 2 veces la misma
//incluso, si usamos numeros para las imágenes, la script puede ser más sencilla

function cambiar() {
     document.getElementById("ia").style.backgroundImage = "url('" + cambia_imagen[rand(cambia_imagen.length) - 1] + "')";
}