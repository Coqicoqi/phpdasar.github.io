// console.log("ok");
// ambiil elemen yang dibutuhkan
var keyword = document.getElementById("keyword");
var tombolCari = document.getElementById("tombol-cari");
var container = document.getElementById("container");
//  tamahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function () {
  // buat object ajax
  var xhr = new XMLHttpRequest();
  // cek kesiapan ajax
  xhr.onreadystatechange = function () {
    if (xhr.readystate == 4 && xhr.status == 200) {
      container.innerHTML = xhr.responseText;
    }
  };

  // eksekusi ajax
  xhr.open("GET", "ajax/mhs.php?keyword=" + keyword.value, true);
  xhr.send();
});
