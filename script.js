let i = 0;
let placeholder = "";
const txt = "Halo / Hello :D";
const speed = 200;
let reverse = false;

function type() {
  if (!reverse) {
    // Menambahkan karakter pada placeholder saat animasi maju
    placeholder += txt.charAt(i);
    i++;

    // Jika mencapai akhir teks, mulai animasi mundur
    if (i === txt.length) {
      reverse = true;
    }
  } else {
    // Menghapus karakter dari placeholder saat animasi mundur
    placeholder = placeholder.slice(0, -1);
    i--;

    // Jika mencapai awal teks, mulai animasi maju
    if (i === 0) {
      reverse = false;
    }
  }

  // Menetapkan placeholder pada elemen input
  const textareaElement = document.getElementById("text-id");
  textareaElement.setAttribute("placeholder", placeholder);


  // Memanggil fungsi type() berdasarkan kecepatan yang ditentukan
  setTimeout(type, speed);
}

type();
