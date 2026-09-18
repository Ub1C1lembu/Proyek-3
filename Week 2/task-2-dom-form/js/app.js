'use strict';
const peserta = [
    { id: 1, nama: 'Alya', prodi: 'Teknik Informatika' },
    { id: 2, nama: 'Bima', prodi: 'Sistem Informasi' },
];
const form = document.querySelector('#form-peserta');
const namaInput = document.querySelector('#nama');
const prodiInput = document.querySelector('#prodi');
const filterInput = document.querySelector('#filter-prodi');
const daftar = document.querySelector('#daftar-peserta');
const status = document.querySelector('#status');
const errorNama = document.querySelector('#error-nama');
const errorProdi = document.querySelector('#error-prodi');
function validasiPeserta(calon) {
    const errorNama = calon.nama.trim().length >= 3 ? '' : 'Nama minimal 3 karakter';
    const errorProdi = calon.prodi ? '' : 'Program studi wajib dipilih';
    return { valid: !errorNama && !errorProdi, errorNama, errorProdi };
}
function buatKartuPeserta(item) {
    const article = document.createElement('article');
    article.classList.add('kartu');
    const h2 = document.createElement('h2');
    const p = document.createElement('p');

    h2.textContent = item.nama;
    p.textContent = item.prodi;

    article.appendChild(h2);
    article.appendChild(p);

    return article;
}
function renderPeserta(data) {
    daftar.replaceChildren();

    if (data.length === 0) {
        status.textContent = 'Tidak ada peserta';
        return;
    }

    status.textContent = '';

    for (const item of data) {
        const kartu = buatKartuPeserta(item);
        daftar.append(kartu);
    }
}
form.addEventListener('submit', (event) => {
    event.preventDefault();

    const nama = namaInput.value;
    const prodi = prodiInput.value;

    const { valid, errorNama: msgNama, errorProdi: msgProdi } = validasiPeserta({ nama, prodi });

    if (msgNama) {
        namaInput.setAttribute('aria-invalid', 'true');
        errorNama.textContent = msgNama;
    } else {
        namaInput.removeAttribute('aria-invalid');
        errorNama.textContent = '';
    }

    if (msgProdi) {
        prodiInput.setAttribute('aria-invalid', 'true');
        errorProdi.textContent = msgProdi;
    } else {
        prodiInput.removeAttribute('aria-invalid');
        errorProdi.textContent = '';
    }

    if (!valid) return;

    peserta.push({ id: Date.now(), nama: nama.trim(), prodi });
    form.reset();
    renderPeserta(peserta);
});
filterInput.addEventListener('change', () => {
    const selectedProdi = filterInput.value;
    if (selectedProdi === 'semua') {
        renderPeserta(peserta);
    } else {
        renderPeserta(peserta.filter(item => item.prodi === selectedProdi));
    }
});
renderPeserta(peserta);