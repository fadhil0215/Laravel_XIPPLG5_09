const profilePic = document.getElementById('profilePic');
const uploadInput = document.getElementById('upload');
const registerDate = document.getElementById('registerDate');

// Set tanggal daftar otomatis saat pertama kali buka
function getRegisterDate() {
  let storedDate = localStorage.getItem('registerDate');
  if (!storedDate) {
    const today = new Date();
    storedDate = today.toLocaleDateString('id-ID');
    localStorage.setItem('registerDate', storedDate);
  }
  registerDate.textContent = storedDate;
}

// Ganti foto profil saat upload file
uploadInput.addEventListener('change', function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      profilePic.src = e.target.result;
      localStorage.setItem('profilePic', e.target.result);
    };
    reader.readAsDataURL(file);
  }
});

// Ambil data dari localStorage kalau ada
window.addEventListener('load', () => {
  getRegisterDate();
  const savedPic = localStorage.getItem('profilePic');
  if (savedPic) {
    profilePic.src = savedPic;
  }
});
