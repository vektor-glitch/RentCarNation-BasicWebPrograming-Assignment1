if (typeof logingacor !== 'undefined' && logingacor) {
    alert('Login berhasil, selamat datang!');
}
if (typeof logingagacor !== 'undefined' && logingagacor) {
    alert(logingagacor);
}

if (window.location.pathname.endsWith('landing.php')) {
    window.onload = function () {
        alert('Order berhasil!');
    };
}
