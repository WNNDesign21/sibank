function toggleNav() {
    var sidenav = document.getElementById("mySidenav");
    var toggleButton = document.querySelector(".navbar-toggle");
    if (sidenav.style.left === "0px") {
        sidenav.style.left = "-250px"; // Menyembunyikan navbar
        toggleButton.classList.remove("open");
        toggleButton.innerHTML = "&#62;"; // Mengubah kembali tanda menjadi ">"
        document.querySelector(".wrapper").classList.remove("wrapper-open");
    } else {
        sidenav.style.left = "0px"; // Menampilkan navbar
        toggleButton.classList.add("open");
        toggleButton.innerHTML = "&#60;"; // Mengubah tanda menjadi "<"
        document.querySelector(".wrapper").classList.add("wrapper-open");
    }
}
