'use strict';

const status = document.querySelector('#status');
const daftar = document.querySelector('#daftar-materi');
const tombolMuat = document.querySelector('#muat');
const tombolCobaLagi = document.querySelector('#coba-lagi');

function aturState(state, pesan) {
    status.dataset.state = state;
    status.textContent = pesan;
    tombolCobaLagi.hidden = state !== 'error';
}

async function ambilMateri() {
    const response = await fetch('data/materi.json');
    if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
    }
    return await response.json();
}

function renderMateri(data) {
    daftar.replaceChildren();
    data.forEach(item => {
        const card = document.createElement('div');
        card.className = 'kartu';

        const title = document.createElement('h3');
        title.textContent = item.judul;

        const duration = document.createElement('p');
        duration.textContent = `Durasi: ${item.durasi} menit`;

        card.appendChild(title);
        card.appendChild(duration);
        daftar.appendChild(card);
    });
}

async function muatData() {
    aturState('loading', 'Memuat data...');
    tombolMuat.disabled = true;
    daftar.replaceChildren();
    try {
        const data = await ambilMateri();
        if (data.length === 0) {
            aturState('empty', 'Data kosong.');
        } else {
            renderMateri(data);
            aturState('success', 'Data berhasil dimuat.');
        }
    } catch (error) {
        console.error(error);
        aturState('error', 'Gagal memuat data: ' + error.message);
    } finally {
        tombolMuat.disabled = false;
    }
}

tombolMuat.addEventListener('click', muatData);
tombolCobaLagi.addEventListener('click', muatData);